@extends('template.tmpDashboard')
@section('title','Banned User')

@section('content')
    <h2>Are You sure to ban {{ $user->name }} ?</h2>
    <div class="mt-5">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger">Sure</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>
@endsection