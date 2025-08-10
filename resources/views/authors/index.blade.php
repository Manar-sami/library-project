@extends('layouts.app')

@section('content')
<h1>قائمة المؤلفين</h1>

<a href="{{ route('authors.create') }}">إضافة مؤلف جديد</a>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>رمز التعريف</th>
            <th>البلد</th>
            <th>عدد الكتب</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->code }}</td>
            <td>{{ $author->country }}</td>
            <td>{{ $author->books_count }}</td>
            <td>
                <a href="{{ route('authors.edit', $author->id) }}">تعديل</a> |
                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
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
