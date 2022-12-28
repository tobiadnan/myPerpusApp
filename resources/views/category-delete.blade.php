@extends('template.tmpDashboard')
@section('title','Delete Categories')

@section('content')
    <h2>Are You sure to delete category {{ $category->name }} ?</h2>
    <div class="mt-5">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger">Sure</a>
        <a href="/categories" class="btn btn-primary">No</a>
    </div>
@endsection