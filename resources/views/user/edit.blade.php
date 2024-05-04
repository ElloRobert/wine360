@extends('layouts.dashboard')


@section('body_class', 'body__interface')


@section('dashboard-content')


<div class="home-dashboard-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-5 padding0 naslov">
				<div class="row ">
					<div class="col-xs-12">
						<h2>{{ trans('user.title') }}</h2>
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-3"> -->	
			<div class="col-xs-3 padding0" >
			</div>
			<div class="col-xs-4 mt-10 text-right">
				
			</div>
		</div>
	</div>

{{-- <div class="row headline-title">
	<div class="col-xs-12">
		<h2>{{ trans('user.title') }}</h2>
	</div>
</div> --}}

<div class="row edit-user-settings mt-45" id="editUserSettings">
	<div class="col-xs-12">
		<div class="col-xs-12 col-md-8">
			<div class="form-group">
				<div class="col-xs-12 col-sm-4 text-right">
				</div>
				<div class="col-xs-12 col-sm-4 padding0">
					<?php
		            if(Auth::user()->image == NULL){
		            ?>
		                <div class="user-image-circle" id="user-no-image-circle">
		                    <form id="edit-user-image" action="{{ route('user.image.edit') }}" method="POST" enctype="multipart/form-data">
		                        {{ csrf_field() }}
		                        <label for="headline-user-image">
		                            <img src="{{ url('/img/interface/fotoaparat.svg') }}" id="slikaKadUserNemaSliku" style="margin-left:55px;">
									<p style="margin-top:15px">Dodajte fotografiju</p>
		                        </label>
								
		                        <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
		                    </form>
		                </div>
		            <?php
		            }else{
		            ?>
		            <img id="user-image" src="{{ url('img/userImage') }}/{{Auth::user()->image}}" alt="" />
		            <form id="edit-user-image" action="{{ route('user.image.edit') }}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                <label for="headline-user-image">
		                    <img src="{{ url('/img/interface/add-icon.svg') }}">
		                </label>
		                <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
		                </form>

		                <form id="remove-user-image-form" action="{{ route('user.image.remove') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <label id="remove-user-image" for="">
                                <img src="{{ url('/img/interface/remove-icon.svg') }}">
                            </label>
                        </form>

		            <?php
		            }
		            ?>
	            </div>
            </div>

            <div class="form-group">
				<div class="col-xs-12 col-sm-12 padding0">
					@if ($errors->has('headline-user-image'))
			            <span class="help-block text-center">
			                <strong>{{ $errors->first('headline-user-image') }}</strong>
			            </span>
			        @endif
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<form id="user-settings-update" method="POST" action="{{ route('user-settings.update', [Auth::user()->id]) }}">

				{{ csrf_field() }}
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userName">{{ trans('user.userName') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userName" id="userName" value="<?php if(!empty(old('userName'))){ echo old('userName'); }else{ echo Auth::user()->name; } ?>" />
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 padding0">
					@if ($errors->has('userName'))
						<span class="help-block text-center">
							<strong>{{ $errors->first('userName') }}</strong>
						</span>	
					@endif
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userEmail">{{ trans('user.userEmail') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="email" name="userEmail" id="userEmail" value="<?php if(!empty(old('userEmail'))){ echo old('userEmail'); }else{ echo Auth::user()->email; } ?>" />
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-sm-10">
						@if ($errors->has('userEmail'))
                            <span class="help-block text-center">
                                <strong>{{ $errors->first('userEmail') }}</strong>
                            </span>
                        @endif
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userPassword">{{ trans('user.userPassword') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input data-character-set="a-z,A-Z,0-9,#" rel="gp" class="form-control1" type="password" name="userPassword" id="userPassword" placeholder="{{ trans('user.userPlaceholder') }}" style="width: 91%" />
					<a type="btn" id="showPassword" ><img id="passwordIcon" src={{asset('img/interface/vidiLozinku.svg')}} style="padding-top: 10px;"></a>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-sm-10">
						@if ($errors->has('userPassword'))
							<span class="help-block text-center">
								<strong>{{ $errors->first('userPassword') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userOIB">{{ trans('user.userOIB') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userOIB" id="userOIB" value="<?php if(!empty(old('userOIB'))){ echo old('userOIB'); }else{ echo Auth::user()->oib; } ?>" />
				</div>
				<div class="col-xs-10 col-sm-10">
					@if ($errors->has('userOIB'))
                        <span class="help-block text-center">
                            <strong>{{ $errors->first('userOIB') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userAddress">{{ trans('user.userAddress') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userAddress" id="userAddress" value="<?php if(!empty(old('userAddress'))){ echo old('userAddress'); }else{ echo Auth::user()->address; } ?>" />
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userCity">{{ trans('user.userCity') }}</label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userCity" id="userCity" value="<?php if(!empty(old('userCity'))){ echo old('userCity'); }else{ echo Auth::user()->city; } ?>" />
				</div>
				@role('admin|legal')
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userCompany">{{ trans('user.userCompany') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="userCompany" id="userCompany" value="<?php if(!empty(old('userCompany'))){ echo old('userCompany'); }else{ echo Auth::user()->company; } ?>" />
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userCompanyOib">{{ trans('user.userCompanyOib') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="userCompanyOib" id="userCompanyOib" value="<?php if(!empty(old('userCompanyOib'))){ echo old('userCompanyOib'); }else{ echo $user->company_oib; } ?>" />
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="">{{ trans('user.employeePermission') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="tgl tgl-bth-input" id="cb2" name="legal_entity_employee_permission" type="checkbox" <?php if(!empty(old('legal_entity_employee_permission'))){ echo 'checked'; }else if(Auth::user()->legal_entity_employee_permission == 1){ echo 'checked'; } ?>/>
    					<label class="tgl-btn" for="cb2"></label>
					</div>
				@endrole
				<div class="form-group lang-form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label">{{ trans('user.userAppLang') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="hr" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'hr'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'hr'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/hr.svg') }}" alt="hr">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="en" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'en'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'en'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/gb.svg') }}" alt="gb">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="de" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'de'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'de'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/de.svg') }}" alt="de">
							</div>
						</div>
					</div>
				</div>
			</div>
				<div class="col-xs-12 col-sm-12 text-center mt-45">
					<button type="submit" class="btn gumb">{{ trans('default.save') }}</button>
				</div>
			</div>
		</form>		
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){

		$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);

		$(window).resize(function(){
			$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);
		});

	});

	$('#showPassword').click(function() {
		var passwordInput = $('#userPassword');
		var currentType = passwordInput.attr('type');
		var passwordIcon = $('#passwordIcon');
		
		if (currentType === 'password') {
			passwordInput.attr('type', 'text');
			passwordIcon.attr('src', '{{asset('img/interface/sakriLozinku.svg')}}');
		} else {
			passwordInput.attr('type', 'password');
			passwordIcon.attr('src', '{{asset('img/interface/vidiLozinku.svg')}}');
		}
	});
</script>
@endsection