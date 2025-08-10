@extends('layouts.app')

@section('content')
<h1>قائمة المكتبات</h1>

<a href="{{ route('libraries.create') }}">إضافة مكتبة جديدة</a>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>اسم المكتبة</th>
            <th>رمز الدولة</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libraries as $library)
        <tr>
            <td>{{ $library->name }}</td>
            <td>{{ $library->country_code }}</td>
            <td>
                <a href="{{ route('libraries.edit', $library->id) }}">تعديل</a> |
                <form action="{{ route('libraries.destroy', $library->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
