@extends('layouts.app')

@section('content')
<h1>قائمة الكتب</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('books.create') }}">إضافة كتاب جديد</a>

<table border="1" cellpadding="5" cellspacing="0" style="margin-top: 10px; width: 100%;">
    <thead>
        <tr>
            <th>العنوان</th>
            <th>المؤلف</th>
            <th>المكتبة</th>
            <th>السعر</th>
            <th>غلاف الكتاب</th>
            <th>إجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->name }} ({{ $book->author->code }})</td>
            <td>{{ $book->library->name }}</td>
            <td>{{ $book->price }} $</td>
            <td>
                @if($book->cover_path)
                    <img src="{{ Storage::url($book->cover_path) }}" alt="Cover" style="height: 60px;">
                @else
                    لا يوجد غلاف
                @endif
            </td>
            <td>
                <a href="{{ route('books.edit', $book) }}">تعديل</a> |
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
