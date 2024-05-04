@extends('layouts.app')

@section('body_class', 'body__home')

@section('content')

<div class="top-bar" style="background-color: white">
    <img class="logo" style="height: 50px; width:auto;" src="{{ asset('img/interface/logo.svg') }}" />
</div>
<div class="container login-form" >
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-back  mt-45" href="{{ url('/login') }}">
                        <div class="col-xs-2 col-sm-2">
                            <img class="logo" style="height: 25px; width:auto;" src="{{ asset('img/interface/arrow-left.svg') }}" />
                        </div>
                        <div class="col-xs-10 col-sm-10">
                            {{ trans('default.back') }}
                        </div>
                    </a>
                </div>
                
                <div class="panel-body ">
                    <form id="user-registration-form" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="row form-content">
                            <div class="col-xs-12 col-md-6 mt-45">
                            {{-- Name --}}
                            <div class="form-group-input-field form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="name" class="">
                                        {{ trans('login.name') }}
                                    </label>
                                    <div class="">
                                        <input id="name" type="name" class="form-control1" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group-input-field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email" class="">
                                        {{ trans('login.email') }}
                                    </label>
                                    <div class="">
                                        <input id="email" type="email" class="form-control1" name="email" value="{{ old('email') }}">
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
                                <div class="col-xs-12 col-sm-12">
                                    <label for="password" class="">
                                        {{ trans('login.password') }}
                                    </label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control1" name="password" value="{{ old('password') }}" >
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



                            {{-- OIB --}}
                            <div class="form-group-input-field form-group{{ $errors->has('oib') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="oib" class="">
                                        {{ trans('login.oib') }}
                                    </label>
                                    <div class="">
                                        <input id="oib" type="text" class="form-control1" name="oib" value="{{ old('oib') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('oib'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('oib') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            </div>
                            <div class="col-xs-12 col-md-6 mt-45">

                            {{-- City --}}
                            <div class="form-group-input-field form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="city" class="">
                                        {{ trans('login.city') }}
                                    </label>
                                    <div class="">
                                        <input id="city" type="text" class="form-control1" name="city" value="{{ old('city') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    @if ($errors->has('city'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            {{-- Address --}}
                            <div class="form-group-input-field form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="address" class="">
                                        {{ trans('login.address') }}
                                    </label>
                                    <div class="">
                                        <input id="address" type="text" class="form-control1" name="address" value="{{ old('address') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    @if ($errors->has('address'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            {{-- Company --}}
                            <div class="form-group-input-field form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="company" class="">
                                        {{ trans('login.company') }}
                                    </label>
                                    <div class="">
                                        <input id="company" type="text" class="form-control1" name="company" value="{{ old('company') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    @if ($errors->has('company'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Company OIB --}}
                            <div class="form-group-input-field form-group{{ $errors->has('company-oib') ? ' has-error' : '' }}">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="company-oib" class="">
                                        {{ trans('login.companyOib') }}
                                    </label>
                                    <div class="">
                                        <input id="company-oib" type="text" class="form-control1" name="company_oib" value="{{ old('company_oib') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    @if ($errors->has('company_oib'))
                                        <span class="help-block text-center">
                                            <strong>{{ $errors->first('company_oib') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn gumb mt-15">
                                    {{ trans('login.singUpButton') }}
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
