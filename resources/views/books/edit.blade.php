@extends('layouts.app')

@section('content')
<h1>تعديل كتاب</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>عنوان الكتاب:</label><br>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" required>
    </div>

    <div>
        <label>المؤلف:</label><br>
        <select name="author_id" required>
            <option value="">-- اختر مؤلف --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>المكتبة:</label><br>
        <select name="library_id" required>
            <option value="">-- اختر مكتبة --</option>
            @foreach($libraries as $library)
                <option value="{{ $library->id }}" {{ old('library_id', $book->library_id) == $library->id ? 'selected' : '' }}>
                    {{ $library->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>السعر:</label><br>
        <input type="number" name="price" value="{{ old('price', $book->price) }}" required step="0.01" min="0">
    </div>

    <div>
        <label>غلاف الكتاب:</label><br>
        <input type="file" name="cover">
        @if ($book->cover_path)
            <p>الصورة الحالية:</p>
            <img src="{{ asset('storage/' . $book->cover_path) }}" alt="Cover" width="150">
        @endif
    </div>

    <button type="submit">تحديث</button>
</form>

<a href="{{ route('books.index') }}">العودة لقائمة الكتب</a>
@endsection
