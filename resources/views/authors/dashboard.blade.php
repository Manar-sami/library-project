@extends('layouts.app')

@section('content')
<div class="container">
    <h1>لوحة تحكم المؤلف</h1>

    <h3>الكتب الخاصة بك:</h3>
    @if($books->count())
        <ul>
            @foreach($books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
    @else
        <p>لا يوجد كتب لعرضها.</p>
    @endif
</div>
@endsection
