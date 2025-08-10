@extends('layouts.app')

@section('content')
<h1>إضافة كتاب جديد</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>عنوان الكتاب:</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required>
    </div>

    <div>
        <label>المؤلف:</label><br>
        <select name="author_id" required>
            <option value="">-- اختر مؤلف --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }} ({{ $author->code }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>المكتبة:</label><br>
        <select name="library_id" required>
            <option value="">-- اختر مكتبة --</option>
            @foreach($libraries as $library)
                <option value="{{ $library->id }}" {{ old('library_id') == $library->id ? 'selected' : '' }}>
                    {{ $library->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>السعر:</label><br>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}" required>
    </div>

    <div>
        <label>غلاف الكتاب (اختياري):</label><br>
        <input type="file" name="cover" accept="image/*">
    </div>

    <button type="submit">حفظ</button>
</form>

<a href="{{ route('books.index') }}">العودة لقائمة الكتب</a>
@endsection
