@extends('template.tmpDashboard')
@section('title','Profile')

@section('content')
    <div class="">
        <h1 class="mt-5">Hey {{ Auth::user()->name }}</h1>
        <h3 class="mb-5">these are your rent history :)</h3>
        <x-rent-log-table :rentLog='$rentLogs'/>
    </div>
@endsection