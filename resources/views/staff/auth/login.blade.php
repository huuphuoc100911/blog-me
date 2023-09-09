@extends('staff.auth.layout')
@section('title', 'Login Staff')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="/assets/staff/assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            @if (session('register_success'))
                                <div class="alert alert-success mx-3">
                                    <button type="button" data-dismiss="alert">×</button>
                                    {{ session('register_success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['staff.postLogin'],
                                    'id' => 'formAuthentication',
                                    'class' => 'needs-validation',
                                ]) !!}
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email']) }}
                                    @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                                        <div class="float-right">
                                            <a href="{{ route('staff.forgot-password') }}" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) }}
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if (session('login_fail'))
                                    <p class="text-danger">{{ session('login_fail') }}</p>
                                @endif

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        {!! Form::checkbox('remember-me', null, false, ['class' => 'custom-control-input']) !!}
                                        {{ Form::label('remember-me', 'Remember Me', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                                </div>
                                {!! Form::close() !!}
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="{{ route('staff.register') }}">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
