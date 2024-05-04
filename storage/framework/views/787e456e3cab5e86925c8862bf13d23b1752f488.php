


<?php $__env->startSection('body_class', 'body__interface'); ?>


<?php $__env->startSection('dashboard-content'); ?>


<div class="home-dashboard-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-5 padding0 naslov">
				<div class="row ">
					<div class="col-xs-12">
						<h2><?php echo e(trans('user.title')); ?></h2>
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
		                    <form id="edit-user-image" action="<?php echo e(route('user.image.edit')); ?>" method="POST" enctype="multipart/form-data">
		                        <?php echo e(csrf_field()); ?>

		                        <label for="headline-user-image">
		                            <img src="<?php echo e(url('/img/interface/fotoaparat.svg')); ?>" id="slikaKadUserNemaSliku" style="margin-left:55px;">
									<p style="margin-top:15px">Dodajte fotografiju</p>
		                        </label>
								
		                        <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
		                    </form>
		                </div>
		            <?php
		            }else{
		            ?>
		            <img id="user-image" src="<?php echo e(url('img/userImage')); ?>/<?php echo e(Auth::user()->image); ?>" alt="" />
		            <form id="edit-user-image" action="<?php echo e(route('user.image.edit')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <label for="headline-user-image">
		                    <img src="<?php echo e(url('/img/interface/add-icon.svg')); ?>">
		                </label>
		                <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
		                </form>

		                <form id="remove-user-image-form" action="<?php echo e(route('user.image.remove')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>


                            <label id="remove-user-image" for="">
                                <img src="<?php echo e(url('/img/interface/remove-icon.svg')); ?>">
                            </label>
                        </form>

		            <?php
		            }
		            ?>
	            </div>
            </div>

            <div class="form-group">
				<div class="col-xs-12 col-sm-12 padding0">
					<?php if($errors->has('headline-user-image')): ?>
			            <span class="help-block text-center">
			                <strong><?php echo e($errors->first('headline-user-image')); ?></strong>
			            </span>
			        <?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<form id="user-settings-update" method="POST" action="<?php echo e(route('user-settings.update', [Auth::user()->id])); ?>">

				<?php echo e(csrf_field()); ?>

				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userName"><?php echo e(trans('user.userName')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userName" id="userName" value="<?php if(!empty(old('userName'))){ echo old('userName'); }else{ echo Auth::user()->name; } ?>" />
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 padding0">
					<?php if($errors->has('userName')): ?>
						<span class="help-block text-center">
							<strong><?php echo e($errors->first('userName')); ?></strong>
						</span>	
					<?php endif; ?>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userEmail"><?php echo e(trans('user.userEmail')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="email" name="userEmail" id="userEmail" value="<?php if(!empty(old('userEmail'))){ echo old('userEmail'); }else{ echo Auth::user()->email; } ?>" />
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-sm-10">
						<?php if($errors->has('userEmail')): ?>
                            <span class="help-block text-center">
                                <strong><?php echo e($errors->first('userEmail')); ?></strong>
                            </span>
                        <?php endif; ?>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userPassword"><?php echo e(trans('user.userPassword')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input data-character-set="a-z,A-Z,0-9,#" rel="gp" class="form-control1" type="password" name="userPassword" id="userPassword" placeholder="<?php echo e(trans('user.userPlaceholder')); ?>" style="width: 91%" />
					<a type="btn" id="showPassword" ><img id="passwordIcon" src=<?php echo e(asset('img/interface/vidiLozinku.svg')); ?> style="padding-top: 10px;"></a>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-sm-10">
						<?php if($errors->has('userPassword')): ?>
							<span class="help-block text-center">
								<strong><?php echo e($errors->first('userPassword')); ?></strong>
							</span>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userOIB"><?php echo e(trans('user.userOIB')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userOIB" id="userOIB" value="<?php if(!empty(old('userOIB'))){ echo old('userOIB'); }else{ echo Auth::user()->oib; } ?>" />
				</div>
				<div class="col-xs-10 col-sm-10">
					<?php if($errors->has('userOIB')): ?>
                        <span class="help-block text-center">
                            <strong><?php echo e($errors->first('userOIB')); ?></strong>
                        </span>
                    <?php endif; ?>
				</div>
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userAddress"><?php echo e(trans('user.userAddress')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userAddress" id="userAddress" value="<?php if(!empty(old('userAddress'))){ echo old('userAddress'); }else{ echo Auth::user()->address; } ?>" />
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="col-xs-10 col-sm-10">
					<label class="control-label" for="userCity"><?php echo e(trans('user.userCity')); ?></label>
				</div>
				<div class="col-xs-10 col-sm-10">
					<input class="form-control1" type="text" name="userCity" id="userCity" value="<?php if(!empty(old('userCity'))){ echo old('userCity'); }else{ echo Auth::user()->city; } ?>" />
				</div>
				<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userCompany"><?php echo e(trans('user.userCompany')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="userCompany" id="userCompany" value="<?php if(!empty(old('userCompany'))){ echo old('userCompany'); }else{ echo Auth::user()->company; } ?>" />
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="userCompanyOib"><?php echo e(trans('user.userCompanyOib')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="userCompanyOib" id="userCompanyOib" value="<?php if(!empty(old('userCompanyOib'))){ echo old('userCompanyOib'); }else{ echo $user->company_oib; } ?>" />
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for=""><?php echo e(trans('user.employeePermission')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="tgl tgl-bth-input" id="cb2" name="legal_entity_employee_permission" type="checkbox" <?php if(!empty(old('legal_entity_employee_permission'))){ echo 'checked'; }else if(Auth::user()->legal_entity_employee_permission == 1){ echo 'checked'; } ?>/>
    					<label class="tgl-btn" for="cb2"></label>
					</div>
				<?php endif; ?>
				<div class="form-group lang-form-group">
					<div class="col-xs-12 col-sm-4 text-right">
						<label class="control-label"><?php echo e(trans('user.userAppLang')); ?></label>
					</div>
					<div class="col-xs-12 col-sm-4 padding0">
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="hr" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'hr'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'hr'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="<?php echo e(asset('img/hr.svg')); ?>" alt="hr">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="en" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'en'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'en'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="<?php echo e(asset('img/gb.svg')); ?>" alt="gb">
							</div>
						</div>
						<div class="col-xs-12 padding0">
							<div class="col-xs-6 padding0 text-right">
								<input type="radio" name="appLanguage" value="de" <?php if(!empty(old('appLanguage')) && old('appLanguage') == 'de'){ echo 'checked'; }else if(Auth::user()->appLanguage == 'de'){ echo 'checked'; } ?>/>
							</div>
							<div class="col-xs-6 padding0 text-right">
								<img class="app-lang" src="<?php echo e(asset('img/de.svg')); ?>" alt="de">
							</div>
						</div>
					</div>
				</div>
			</div>
				<div class="col-xs-12 col-sm-12 text-center mt-45">
					<button type="submit" class="btn gumb"><?php echo e(trans('default.save')); ?></button>
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
			passwordIcon.attr('src', '<?php echo e(asset('img/interface/sakriLozinku.svg')); ?>');
		} else {
			passwordInput.attr('type', 'password');
			passwordIcon.attr('src', '<?php echo e(asset('img/interface/vidiLozinku.svg')); ?>');
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\wine360\resources\views/user/edit.blade.php ENDPATH**/ ?>