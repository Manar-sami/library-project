@extends('layouts.app')

@section('content')
<h1>تعديل بيانات المكتبة</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('libraries.update', $library->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>اسم المكتبة:</label><br>
        <input type="text" name="name" value="{{ old('name', $library->name) }}" required>
    </div>

    <div>
        <label>رمز الدولة:</label><br>
        <input type="text" name="country_code" value="{{ old('country_code', $library->country_code) }}" required>
    </div>

    <button type="submit">تحديث</button>
</form>

<a href="{{ route('libraries.index') }}">العودة لقائمة المكتبات</a>
@endsection
