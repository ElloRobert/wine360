@extends('layouts.dashboard')

@section('body_class', 'body__interface')

@section('dashboard-content')

<div class="home-dashboard-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-5 padding0 naslov">
				<div class="row ">
					<div class="col-xs-12">
						<h2>{{ trans('user.title') }} {{ $user->name }}</h2>
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


<div class="row edit-user-settings">
	<div class="col-xs-12">
		<div class="col-xs-12 col-md-6">

			<div class="form-group">
				<div class="col-xs-12 col-sm-4 text-right">
					<label class="control-label" for="headline-user-image">{{ trans('user.userImage') }}</label>
				</div>
				<div class="col-xs-12 col-sm-4 padding0">
					<?php
		            if($user->image == NULL){
		            ?>
		                <div class="user-image-circle">
		                    <form id="edit-user-image" action="{{ route('user.image.edit') }}" method="POST" enctype="multipart/form-data">
		                        {{ csrf_field() }}

		                        <label for="headline-user-image">
		                            <img src="{{ url('/img/interface/add-icon.svg') }}">
		                        </label>
		                        <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
		                    </form>
		                </div>
		            <?php
		            }else{
		            ?>
		                <img id="user-image" src="{{ url('img/userImage') }}/{{$user->image}}" alt="" />
		                <form id="edit-user-image" action="{{ route('user.image.edit') }}" method="POST" enctype="multipart/form-data">
		                    {{ csrf_field() }}

		                    <label for="headline-user-image">
		                        <img src="{{ url('/img/interface/add-icon.svg') }}">
		                    </label>
		                    <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
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
			

			<form id="user-settings-update" method="POST" action="{{ route('user-settings.update', [$user->id]) }}">

				{{ csrf_field() }}

				<div class="form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label" for="userName">{{ trans('user.userName') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<input class="form-control" type="text" name="userName" id="userName" 
						value="<?php if(!empty(old('userName'))){ echo old('userName'); }else{ echo $user->name; } ?>" />
					</div>
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
				


				<div class="form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label" for="userEmail">{{ trans('user.userEmail') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<input class="form-control" type="email" name="userEmail" id="userEmail" value="<?php if(!empty(old('userEmail'))){ echo old('userEmail'); }else{ echo $user->email; } ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 padding0">
						@if ($errors->has('userEmail'))
                            <span class="help-block text-center">
                                <strong>{{ $errors->first('userEmail') }}</strong>
                            </span>
                        @endif
					</div>
				</div>



				<div class="form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label" for="userPassword">{{ trans('user.userPassword') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<input data-character-set="a-z,A-Z,0-9,#" rel="gp" class="form-control" type="text" name="userPassword" id="userPassword" placeholder="{{ trans('user.userPlaceholder') }}" />

						<a title="{{ trans('default.generateNewPassword') }}" class="default-button getNewPass"><span class="fa fa-refresh"></span></a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 padding0">
						@if ($errors->has('userPassword'))
                            <span class="help-block text-center">
                                <strong>{{ $errors->first('userPassword') }}</strong>
                            </span>
                        @endif
					</div>
				</div>



				<div class="form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label" for="userAddress">{{ trans('user.userAddress') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<input class="form-control" type="text" name="userAddress" id="userAddress" value="<?php if(!empty(old('userAddress'))){ echo old('userAddress'); }else{ echo $user->address; } ?>" />
					</div>
				</div>
				<div class="form-group"></div>



				<div class="form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label" for="userCity">{{ trans('user.userCity') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<input class="form-control" type="text" name="userCity" id="userCity" value="<?php if(!empty(old('userCity'))){ echo old('userCity'); }else{ echo $user->city; } ?>" />
					</div>
				</div>
				<div class="form-group"></div>



				@role('admin|legal')
					<div class="form-group">
						<div class="col-xs-12 col-sm-4 text-right">
							<label class="control-label" for="userOIB">{{ trans('user.userOIB') }}</label>
						</div>
						<div class="col-xs-12 col-sm-4 padding0">
							<input class="form-control" type="text" maxlength="11" name="userOIB" id="userOIB" 
							value="<?php if(!empty(old('userOIB'))){ echo old('userOIB'); }else{ echo $user->oib; } ?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('userOIB'))
	                            <span class="help-block text-center">
	                                <strong>{{ $errors->first('userOIB') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>


					<div class="form-group">
						<div class="col-xs-12 col-sm-4 text-right">
							<label class="control-label" for="userCompany">{{ trans('user.userCompany') }}</label>
						</div>
						<div class="col-xs-12 col-sm-4 padding0">
							<input class="form-control" type="text" name="userCompany" id="userCompany" value="<?php if(!empty(old('userCompany'))){ echo old('userCompany'); }else{ echo $user->company; } ?>" />
						</div>
					</div>
					<div class="form-group"></div>


					<div class="form-group">
						<div class="col-xs-12 col-sm-4 text-right">
							<label class="control-label" for="userCompanyOib">{{ trans('user.userCompanyOib') }}</label>
						</div>
						<div class="col-xs-12 col-sm-4 padding0">
							<input class="form-control" type="text" name="userCompanyOib" id="userCompanyOib" value="<?php if(!empty(old('userCompanyOib'))){ echo old('userCompanyOib'); }else{ echo $user->company_oib; } ?>" />
						</div>
					</div>
					<div class="form-group"></div>
				@endrole



				<div class="form-group lang-form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label">{{ trans('user.userAppLang') }}</label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="hr" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'hr'){ echo 'checked'; }else if($user->appLanguage == 'hr'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/hr.svg') }}" alt="hr">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="en" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'en'){ echo 'checked'; }else if($user->appLanguage == 'en'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/gb.svg') }}" alt="gb">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="de" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'de'){ echo 'checked'; }else if($user->appLanguage == 'de'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="{{ asset('img/de.svg') }}" alt="de">
							</div>
						</div>
					</div>
				</div>


				
				<div class="form-group">
					<div class="col-xs-12 col-sm-8 text-right padding0">
						<button type="submit">{{ trans('default.save') }}</button>
					</div>
				</div>
				
			</form>
		</div>


		<div class="col-xs-12 col-md-6 edit-user-role">
			<h3>
				{{ trans('user.adminEditRole') }}
			</h3>

			<div class="row">
				<span>{{ trans('user.currentUserRole') }}:</span>
			</div>

			<div class="row role-row">
				<form id="edit-user-role-form">
					{{ csrf_field() }}
					<input type="hidden" id="u_id" name="u_id" value="{{ $user->id }}">
				
					@foreach($roles as $role)
					<div class="col-xs-12">
						<label for="{{ $role->slug }}">
							@if($role->slug == 'legal')
								{{ trans('home.legal') }}
							@elseif($role->slug == 'employee')
								{{ trans('home.employee') }}
							@elseif($role->slug == 'private')
								{{ trans('home.private') }}
							@else
								{{ $role->name }}
							@endif
						</label>
						<input id="{{ $role->slug }}" type="radio" name="roleRadio" value="{{ $role->id }}" @if($role->slug == $user->getRoles()->first()->slug) checked @endif>
					</div>
					@endforeach

					<div class="success-msg"></div>
				
				</form>

				<div class="col-xs-12">
					<button id="adminEditRole" class="default-button">Promijeni</button>
				</div>
			</div>
		</div>

	</div>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);

		$(window).resize(function(){
			$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);
		});

		/**
		* Admin edit user role
		*/
		$('.edit-user-role #adminEditRole').click(function(){
			var radio_value = $('.edit-user-role input[name=roleRadio]:checked').val();
			var CSRF_TOKEN = jQuery('#edit-user-role-form input[name="_token"]').val();

			jQuery.ajax({
				type: "POST",
				url: '{{url("user")}}/admin/'+$('#u_id').val()+'/edit/role',
				data: {
					u_role: radio_value,
					_token: CSRF_TOKEN
				},
				success: function(data) {
					$('#edit-user-role-form .success-msg').html('<div class="col-xs-12 alert alert-success" role="alert"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>{{ trans("user.successEditRole") }}</div>');
				},
				error: function (request, status, error) {
					$('#edit-user-role-form .success-msg').html('<div class="col-xs-12 alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{ trans("user.failureEditRole") }}</div>');
				}
			});
		});
	});
</script>

@endsection