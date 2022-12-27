@extends('template.tmpDashboard')
@section('title','Dashboard')

@section('content')

<h1 class="mb-5 mt-5">Welcome, {{ Auth::user()->username }}</h1>

<div class="row" mt-5>
    <div class="col-lg-4">
        <div class="card-data books">
            <div class="row">
                <div class="col-6"><i class="bi bi-book"></i></div>
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
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Book Title</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" style="text-align: center">No Data</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection