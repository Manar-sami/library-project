@extends('layouts.app')

@section('content')
<h1>إضافة مكتبة جديدة</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('libraries.store') }}" method="POST">
    @csrf

    <div>
        <label>اسم المكتبة:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>رمز الدولة:</label><br>
        <input type="text" name="country_code" value="{{ old('country_code') }}" required>
    </div>

    <button type="submit">حفظ</button>
</form>

<a href="{{ route('libraries.index') }}">العودة لقائمة المكتبات</a>
@endsection
