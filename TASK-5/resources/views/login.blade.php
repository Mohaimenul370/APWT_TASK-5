@extends('layouts.auth')
@section('title', 'Login')
@section('plugin-css')

@endsection
@section('plugin-js')
@endsection

@section('content')
<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <div class="auth-logo">
                        <a href="index.php" class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.php" class="logo logo-light text-center">
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="22">
                            </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>



                <!-- form -->
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group">

                    @include('inc.flash-message')
                       
                        
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required="" placeholder="Enter your email" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a href="auth-recoverpw-2.php" class="text-muted float-right"><small>Forgot your password?</small></a>
                        <label for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter your password">



                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text">
                                    <span class="password-eye"></span>
                                </div>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" value="1" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>


                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">


                        <button class="btn btn-primary btn-block" type="submit">Log In </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="{{ route('registration') }}" class="text-muted ml-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3 text-white">Quotes!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> Any fool can write code that a computer can understand. Good programmers write code that humans can understand. <i class="mdi mdi-format-quote-close"></i>
            </p>
            <h5 class="text-white">
                - Martin Fowler
            </h5>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->
@endsection