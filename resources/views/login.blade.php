@extends('template.main')
@section('container')

<h1 class="text-center mb-5">LOGIN FORM</h1>
<div class="main d-flex justify-content-center align-items-center">
    <div class="login-box">
        <form action="" method="POST">
            @csrf
            <!-- Uname input -->
            <div class="form-outline mb-3">
                <input type="username" id="username" class="form-control form-control-lg" name="username"/>
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3 form-control-lg">LOGIN</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="register">Register</a></p>
            </div>
        </form>
    </div>
</div>
@endsection