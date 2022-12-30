@extends('template.tmpDashboard')
@section('title','Delete Book')

@section('content')
    <h2>Are You sure to delete book {{ $book->title }} ?</h2>
    <div class="mt-5">
        <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger">Sure</a>
        <a href="/books" class="btn btn-primary">No</a>
    </div>
@endsection