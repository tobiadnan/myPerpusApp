@extends('template.tmpDashboard')
@section('title','Profile')

@section('content')
    <div class="">
        <h2>My Rent History</h2>
        <x-rent-log-table :rentLog='$rentLogs'/>
    </div>
@endsection