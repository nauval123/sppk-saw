@extends('layouts.app')

@section('content')
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
{{--                        <img src="#" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">--}}
                        <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Sistem Bantuan Covid-19 Desa </span></h4>
                        <p class="text-muted">Membantu memberikan informasi pendataan, pemberkasan dan penyaluran bantuan COVID-19 </p>
{{--                        <form method="POST" action="#" class="needs-validation" novalidate="">--}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
{{--                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>--}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
{{--                                            <strong>{{ trans($message) }}</strong>--}}
                                            <strong>{{"login gagal,username / password salah !"}}</strong>

                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
{{--                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>--}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans($message) }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
{{--                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">--}}
{{--                                    <label class="custom-control-label" for="remember-me">Remember Me</label>--}}
                                </div>
                            </div>

                            <div class="form-group text-right">
{{--                                <a href="auth-forgot-password.html" class="float-left mt-3">--}}
{{--                                    Forgot Password?--}}
{{--                                </a>--}}
{{--                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">--}}
{{--                                    Login--}}
{{--                                </button>--}}
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>

                            <div class="mt-5 text-center">
{{--                                Don't have an account? <a href="auth-register.html">Create new one</a>--}}
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Kelompok 5
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                    <h1 class="mb-2 display-4 font-weight-bold">Sistem Bantuan Covid-19 Desa</h1>
                                <h5 class="font-weight-normal text-muted-transparent"> Indonesia</h5>
                            </div>
{{--                            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header text-center"><h4>SPPK Bantuan Covid 19 Desa</h4></div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                                @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}">Register</a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
@endsection
