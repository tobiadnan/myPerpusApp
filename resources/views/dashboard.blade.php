@extends('template.tmpDashboard')
@section('title','Dashboard')

@section('content')

@if (Auth::user()->name == null)
    <h1 class="mb-5 mt-5">Welcome</h1>
@else
    <h1 class="mb-5 mt-5">Welcome, {{ Auth::user()->name }}</h1>
@endif

<div class="row" mt-5>
    <div class="col-lg-4">
        <div class="card-data books">
            <div class="row" >
                <div class="col-6">
                    <i class="bi bi-book"></i></div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                        <div  class="card-desc">Books</div>
                    <div class="card-count">{{ $book_count }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-data categories">
            <div class="row">
                <div class="col-6"><i class="bi bi-list-task"></i></div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div  class="card-desc">Categories</div>
                    <div class="card-count">{{ $category_count }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-data users">
            <div class="row">
                <div class="col-6"><i class="bi bi-people"></i></div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div  class="card-desc">Users</div>
                    <div class="card-count">{{ $user_count }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h2>#Rent Logs</h2>
    <div class="text-end text-decoration-underline mt-3"><a href="/rentLogs">View all</a></div>
    
     <x-rent-log-table :rentLog='$rentLogs'/>
</div>
@endsection