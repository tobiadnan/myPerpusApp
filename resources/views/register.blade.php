@extends('template.main')
@section('container')
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box">
            <form action="" method="POST">
                @csrf
                <!-- Uname input -->
                <div  class="text-center mb-5">
                    <h1>REGISTER myPerpus</h1>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                {{-- Username input --}}
                <div class="form-outline mb-3">
                    <input type="username" id="username" class="form-control form-control-lg" name="username" required/>
                    <label class="form-label" for="username">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                    <label class="form-label" for="password">Password</label>
                </div>
                
                {{-- Phone input --}}
                <div class="form-outline mb-3">
                    <input type="phone" id="phone" class="form-control form-control-lg" name="phone" required/>
                    <label class="form-label" for="phone">Phone</label>
                </div>

                {{-- Address input --}}
                <div class="form-outline mb-3">
                    <textarea type="address" id="address" class="form-control form-control-lg" name="address" required></textarea>
                    <label class="form-label" for="address">Address</label>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3 form-control-lg">REGISTER</button>

                <!-- Login buttons -->
                <div class="text-center">
                    <p>Have an account ? <a href="login">Login</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection