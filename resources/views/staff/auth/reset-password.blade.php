@extends('staff.auth.layout')
@section('title', 'Register')
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
                                <h4>Reset Password</h4>
                            </div>

                            <div class="card-body">
                                {!! Form::open([
                                    'method' => 'PUT',
                                    'route' => ['staff.change-password'],
                                    'id' => 'formAuthentication',
                                    'class' => 'mb-3',
                                ]) !!}
                                {!! Form::hidden('token', request()->token) !!}
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="password" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="confirm_password" tabindex="2" required>
                                    @error('confirm_password')
                                        <span class="error text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                {!! Form::submit('Change Password', ['class' => 'btn btn-primary d-grid w-100']) !!}
                                {!! Form::close() !!}
                            </div>
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
