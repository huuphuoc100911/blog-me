@extends('staff.auth.layout')
@section('title', 'Forgot Password')
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
                                <h4>Forgot Password</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted">We will send a link to reset your password</p>
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['staff.send-mail'],
                                    'id' => 'formAuthentication',
                                    'class' => 'mb-3',
                                ]) !!}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        required autofocus>
                                </div>
                                @if (session('send_message_success'))
                                    <p class="text-success">{{ session('send_message_success') }}</p>
                                @endif
                                @if (session('send_message_fail'))
                                    <p class="text-danger">{{ session('send_message_fail') }}</p>
                                @endif

                                {!! Form::submit('Send Reset Link', ['class' => 'btn btn-primary d-grid w-100']) !!}
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
