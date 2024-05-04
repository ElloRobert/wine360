@extends('layouts.app')

@section('body_class', 'body__home')

@section('content')
<div class="container login-form">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 padding0">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <a class="default-button def-btn-back" href="{{ url('/login') }}">{{ trans('default.back') }}</a>

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
                    @if (session('status'))
                        <div style="position: relative;float: unset;z-index: 999;" class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    <form id="reset-password-form" class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="row form-content">

                            <img class="login-bg-image" src="{{ asset('img/login/login-bg-img.svg') }}" />


                            <div class="form-group-input-field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="email" class="login-label-icon col-xs-3 padding0">
                                        <img src="{{ asset('img/login/user-icon.svg') }}" />
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
