@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 25px;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="file"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }

    .btn-submit {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .back-link {
        display: inline-block;
        margin-top: 15px;
        color: #007bff;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .errors {
        background-color: #ffe6e6;
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        color: #cc0000;
    }

    .errors ul {
        margin: 0;
        padding-left: 20px;
    }
</style>

<div class="form-container">
    <h1>إضافة كتاب جديد</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>عنوان الكتاب:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label>المؤلف:</label>
            <select name="author_id" required>
                <option value="">-- اختر مؤلف --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }} ({{ $author->code }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>المكتبة:</label>
            <select name="library_id" required>
                <option value="">-- اختر مكتبة --</option>
                @foreach($libraries as $library)
                    <option value="{{ $library->id }}" {{ old('library_id') == $library->id ? 'selected' : '' }}>
                        {{ $library->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>السعر:</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label>غلاف الكتاب (اختياري):</label>
            <input type="file" name="cover" accept="image/*">
        </div>

        <button type="submit" class="btn-submit">حفظ</button>
    </form>

    <a href="{{ route('books.index') }}" class="back-link">العودة لقائمة الكتب</a>
</div>
@endsection
