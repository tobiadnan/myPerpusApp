@extends('template.tmpDashboard')
@section('title','Dashboard')

@section('content')

<h1 class="mb-5">Welcome, {{ Auth::user()->username }}</h1>

<div class="row" mt-5>
    <div class="col-lg-4">
        <div class="card-data books">
            <div class="row">
                <div class="col-6"><i class="bi bi-book"></i></div>
                <div class="col-6 d-flex justify-content-center flex-column align-items-end">
                    <div  class="card-desc">Books</div>
                    <div class="card-count">175</div>
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
                    <div class="card-count">23</div>
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
                    <div class="card-count">311</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection