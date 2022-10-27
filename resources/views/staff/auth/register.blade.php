@extends('staff.auth.layout')
@section('title', 'Register')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="/css/staff/assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            @if (session('register_fail'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('register_fail') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <form method="POST" action="{{ route('staff.postRegister') }}">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['staff.postRegister'],
                                ]) !!}
                                    <div class="form-group">
                                        {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your username']) }}
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email']) }}
                                        @error('email')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            {{ Form::label('password', 'Password', ['class' => 'form-label d-block']) }}
                                            {{ Form::password('password', ['class' => 'form-control pwstrength', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) }}
                                            @error('password')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('confirm_password', 'Password Confirmation', ['class' => 'form-label d-block']) }}
                                            {{ Form::password('password-confirm', ['class' => 'form-control pwstrength', 'placeholder' => '&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;']) }}
                                            @error('password-confirm')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input"
                                                id="agree">
                                            {!! Form::checkbox('agree', null, false, ['class' => 'custom-control-input']) !!}
                                            <label class="custom-control-label" for="agree">I agree with the terms and
                                                conditions</label>
                                        </div>
                                        @error('agree')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Register', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            I already have an account! <a href="{{ route('staff.login') }}">Login</a>
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
