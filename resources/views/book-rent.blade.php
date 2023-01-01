@extends('template.tmpDashboard')
@section('title','Book Rent')

@section('content')
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offsite-md-3">
        <h1 class="mb-5">Book Rent Form</h1>
        <form action="" method="post">
            <div class="form-outline mb-3">
                <input type="user" id="user" class="form-control form-control-lg" name="user" required/>
                <label class="form-label" for="user">User</label>
            </div>

            <div class="form-outline mb-3">
                <input type="book" id="book" class="form-control form-control-lg" name="book" required/>
                <label class="form-label" for="book">Book</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-3 form-control-lg">SUBMIT</button>
        </form>
    </div>
@endsection