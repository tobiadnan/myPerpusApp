@extends('template.main')
@section('container')

<div class="main d-flex flex-column justify-content-center align-items-center">

    <div class="login-box">
        <form action="" method="POST">
            @csrf
            <!-- Uname input -->
            <div  class="text-center mb-5">
                <h1>LOGIN myPerpus</h1>
            </div>
            <div class="form-outline mb-3">
                <input type="username" id="username" class="form-control form-control-lg" name="username" required/>
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                <label class="form-label" for="password">Password</label>
            </div>
            
            
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif

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