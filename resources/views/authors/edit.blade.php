@extends('layouts.app')

@section('content')
<h1>إضافة مؤلف جديد</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('authors.store') }}" method="POST">
    @csrf

    <div>
        <label>الاسم:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>رمز التعريف:</label><br>
        <input type="text" name="code" value="{{ old('code') }}" required>
    </div>

    <div>
        <label>البلد:</label><br>
        <input type="text" name="country" value="{{ old('country') }}" required>
    </div>

    <div>
        <label>عدد الكتب:</label><br>
        <input type="number" name="books_count" value="{{ old('books_count', 0) }}" min="0">
    </div>

    <div>
        <label>البريد الإلكتروني:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>كلمة المرور:</label><br>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>تأكيد كلمة المرور:</label><br>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">حفظ</button>
</form>

<a href="{{ route('authors.index') }}">العودة لقائمة المؤلفين</a>
@endsection
