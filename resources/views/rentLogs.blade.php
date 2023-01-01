@extends('template.tmpDashboard')
@section('title','Rent Logs')

@section('content')
    <h1>Rent Logs List</h1>

    <div class="mt-5">
        <x-rent-log-table :rentLog='$rentLogs'/>
    </div>
@endsection