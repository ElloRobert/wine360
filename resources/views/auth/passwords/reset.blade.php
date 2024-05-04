@extends('layouts.app')
{{--
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

--}}










@section('body_class', 'body__home')

@section('content')
<div style="height: 100vh;" class="container login-form password-reset-link">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 padding0">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row logo-img">
                        <img class="logo" src="{{ asset('img/Wine360-logo.svg') }}" />
                    </div>
                    <div class="row border">
                        <img class="border-img" src="{{ asset('img/login/border-line.png') }}" />
                    </div>
                    <div class="row headline text-center">
                        <span>{{ trans('login.passwordReset') }}</span>
                    </div>
                </div>
                <div class="panel-body">

                    <form id="password-reset" class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        
                        <div class="row form-content">
                            <img class="login-bg-image" src="{{ asset('img/login/login-bg-img.svg') }}" />

                            <input type="hidden" name="token" value="{{ $token }}">

                            {{-- Email --}}
                            <div class="form-group-input-field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="email" class="login-label-icon col-xs-3 padding0">
                                        <img src="{{ asset('img/login/user-email-icon.svg') }}" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('login.email') }}" >
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            {{-- Password --}}
                            <div class="form-group-input-field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="password" class="login-label-icon col-xs-3 padding0">
                                        <img src="{{ asset('img/login/password-icon.svg') }}" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="{{ trans('login.password') }}" >
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('password'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            {{-- Password --}}
                            <div class="form-group-input-field form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="password" class="login-label-icon col-xs-3 padding0">
                                        <img src="{{ asset('img/login/password-icon.svg') }}" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('login.passwordConfirmation') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row form-submit">
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn">
                                        {{ trans('login.sendResetPasswordLink') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
