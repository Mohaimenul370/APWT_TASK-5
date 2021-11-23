@extends('layouts.auth')
@section('title', 'Registration')
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
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="../assets/images/logo-dark.png" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-lg">
                                <img src="../assets/images/logo-light.png" alt="" height="22">
                            </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <h4 class="mt-0"></h4>
                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

                <!-- form -->
                <form action="{{ route('registration') }}" method="post">

                    @csrf

                    @include('inc.flash-message')



                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" required="" placeholder="Enter your name" autocomplete="name" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="checkbox-signup">
                            <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary waves-effect waves-light btn-block" type="submit"> Sign Up </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3 mb-0">
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
                    <p class="text-muted">Already have account? <a href="{{ route('login') }}" class="text-muted ml-1"><b>Log In</b></a></p>
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