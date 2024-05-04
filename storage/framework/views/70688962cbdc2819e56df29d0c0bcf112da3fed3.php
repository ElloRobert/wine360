

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('dashboard-content'); ?>

<div class="home-dashboard-content configuration-home">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-5 padding0 naslov">
				<div class="row ">
					<div class="col-xs-12">
						<h2><?php echo e(trans('configuration.configurationApp')); ?></h2>
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

	<div class="row mt-45" id="editUserSettings">
		<div class="col-xs-12">
			<div class="col-xs-12 col-md-6 mt-45">
				<div class="col-xs-12 config-message padding0">
					<div class="row">
						<?php if(Session::has('message-success')): ?>
						<div class="alert alert-info" role="alert">
							<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-ok"></span>
								<?php echo e(Session::get('message-success')); ?>

						</div>
						<?php endif; ?>
						</div>
				</div>

				<form id="configuration" <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal')): ?> method="POST" action="<?php echo e(route('configurationUpdate')); ?>" <?php endif; ?> >
					<?php echo e(csrf_field()); ?>

					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationAddress"><?php echo e(trans('configuration.applicationAddress')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationAddress" id="applicationAddress" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationAddress); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationAddress); ?>" <?php endif; ?>/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationAddress')): ?>
							<span class="help-block text-center">
								<strong><?php echo e($errors->first('applicationAddress')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationAddress2"><?php echo e(trans('configuration.applicationAddress2')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationAddress2" id="applicationAddress2" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationAddress2); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationAddress2); ?>" <?php endif; ?> />
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationAddress2')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationAddress2')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationCity"><?php echo e(trans('configuration.applicationCity')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationCity" id="applicationCity" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationCity); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationCity); ?>" <?php endif; ?>/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationCity')): ?>
							<span class="help-block text-center">
								<strong><?php echo e($errors->first('applicationCity')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationState"><?php echo e(trans('configuration.applicationState')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationState" id="applicationState" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationState); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationState); ?>" <?php endif; ?>/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationState')): ?>
							<span class="help-block text-center">
								<strong><?php echo e($errors->first('applicationState')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationZip"><?php echo e(trans('configuration.applicationZip')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationZip" id="applicationZip" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationZip); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationZip); ?>" <?php endif; ?>/>
						</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationZip')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationZip')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationCountry"><?php echo e(trans('configuration.applicationCountry')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationCountry" id="applicationCountry" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationCountry); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationCountry); ?>" <?php endif; ?>/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationCountry')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationCountry')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mt-45">
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationPhone"><?php echo e(trans('configuration.applicationPhone')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationPhone" id="applicationPhone" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationPhone); ?>" <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?> value="<?php echo e(Auth::user()->configuration->applicationPhone); ?>" <?php endif; ?>/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationPhone')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationPhone')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationIndustry"><?php echo e(trans('configuration.applicationIndustry')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<select class="form-control1" name="applicationIndustry" id="applicationIndustry">
							<?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($industry->id); ?>"
									<?php if (Auth::check() && Auth::user()->hasRole('employee')): ?>
										<?php echo e(Auth::user()->legalEntityUser->configuration->applicationIndustry == $industry->id ? 'selected' : ''); ?>

									<?php endif; ?>
									<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?>
										<?php echo e(Auth::user()->configuration->applicationIndustry == $industry->id ? 'selected' : ''); ?>

									<?php endif; ?>>
										<?php echo e($industry->name); ?>

									</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					<div class="form-group">
						<div class="col-xs-10 col-sm-10">
							<?php if($errors->has('applicationIndustry')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationIndustry')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationPricePerLiter"><?php echo e(trans('configuration.applicationPricePerLiter')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationPricePerLiter" id="applicationPricePerLiter"
							<?php if (Auth::check() && Auth::user()->hasRole('employee')): ?>
								disabled value="<?php echo e(Auth::user()->legalEntityUser->configuration->applicationPricePerLiter); ?>"
							<?php endif; ?>
							<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?>
								value="<?php echo e(Auth::user()->configuration->applicationPricePerLiter); ?>"
							<?php endif; ?>/>
							<?php if(Auth::user()->configuration->applicationPricePerLiter == null): ?>
								<label class="control-label"><?php echo e(trans('configuration.applicationPricePerLiterDefault')); ?></label>
							<?php endif; ?>
					</div>
					<div class="form-group">
						<div class="col-xs-10 col-sm-10">
							<?php if($errors->has('applicationPricePerLiter')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationPricePerLiter')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="vehicleGroup"><?php echo e(trans('configuration.vehicleGroup')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<select name="vehicleGroup" class="form-control1">
							<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value=<?php echo e($vehicleGroup->id); ?> <?php if(Auth::user()->configuration->vehicle_group_id == $vehicleGroup->id): ?> selected <?php endif; ?> ><?php echo e($vehicleGroup->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
						</select>							
					</div>
					<div class="form-group vehicleGroupSubcategory ">
						<div class="col-xs-12 col-sm-4 mt-45">
							<label class="control-label" for="vehicleGroupSubcategory"><?php echo e(trans('configuration.subcategory')); ?></label>
						</div>
						<div id="subcategoryContainer" class="col-xs-12 col-sm-4 col-md-6 col-lg-5  mt-45">
							<!-- Ovdje se prikazuju subkategorije -->
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							<?php if($errors->has('applicationPricePerLiter')): ?>
								<span class="help-block text-center">
									<strong><?php echo e($errors->first('applicationPricePerLiter')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="admin-reports"><?php echo e(trans('configuration.emailForReports')); ?></label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="admin-reports" id="admin-reports" disabled value="<?php echo e(App\User::find(1)->configuration->emailForReports); ?>" />
					</div>
					<div class="form-group">
					</div>
					</div>
					<?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal')): ?>
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 text-center padding0 mt-45">
								<button type="submit" class="btn gumb"><?php echo e(trans('configuration.saveConfiguration')); ?></button>
							</div>
						</div>
					<?php endif; ?>
				</form>
			</div>

			<?php if (Auth::check() && Auth::user()->hasRole('legal|employee')): ?>
			<div class="col-xs-12 col-md-6">
				<?php if (! ($active_employees->isEmpty())): ?>
				<div class="col-xs-12 padding0 employees">
					<h3><?php echo e(trans('configuration.listEmployees')); ?></h3>
					<div class="row default-div-table">
						<div class="row default-div-table-header">
							<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?>">
								<strong><?php echo e(trans('user.userName')); ?></strong>
							</div>
							<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?> text-center">
								<strong><?php echo e(trans('user.userEmail')); ?></strong>
							</div>
							<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
								<div class="col-xs-4 text-center">
									<strong><?php echo e(trans('default.action')); ?></strong>
								</div>
							<?php endif; ?>
						</div>

						<?php $__currentLoopData = $active_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="row default-div-table-rows">
								<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?>">
									<span class="vertical-align-center"><?php echo e($employee->name); ?></span>
								</div>
								<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?> text-center">
									<span class="vertical-align-center"><?php echo e($employee->email); ?></span>
								</div>

								<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
								<div class="col-xs-4 text-right padding0">
									<a data-em="<?php echo e($employee->id); ?>" class="default-button remove-employee-model">
										<span class="glyphicon glyphicon-trash" style="vertical-align:-1px;"></span>
									</a>
								</div>

								<div class="modal" id="remove-employee-model-<?php echo e($employee->id); ?>" style="display: none;">
									<div class="modal-dialog">
										<div class="modal-content model-content-delete">
											<div class="modal-header modal-header-delete">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title model-title-delete"><?php echo e(trans('configuration.deleteConfirmation')); ?></h4>
											</div>
											<div class="modal-body">
												<div class="row marginTop">
													<p><?php echo e(trans('configuration.deleteConfirmationText')); ?> <?php echo e($employee->name); ?>?</p>
												</div>
											</div>
											<div class="modal-footer">
												<form method="POST" action="<?php echo e(route('delete.employee', [$employee->id])); ?>">
													<?php echo e(csrf_field()); ?>

													<?php echo e(method_field('DELETE')); ?>


													<button title="<?php echo e(trans('default.removeEmployee')); ?> <?php echo e($employee->name); ?>" type="submit" class="btn gumb">
														<?php echo e(trans('default.confirmDeactivationButton')); ?>

													</button>
												</form>

												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
											</div>
										</div>
									</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<?php endif; ?>
				<div class="col-xs-12 marginTop add-employee-message padding0">
					<div class="row">
						<?php if(Session::has('message-add-employee')): ?>
							<div class="alert alert-info" role="alert">
								<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-ok"></span>
									<?php echo e(Session::get('message-add-employee')); ?>

							</div>
							<?php endif; ?>
							<?php if(Session::has('message-delete-employee')): ?>
							<div class="alert alert-danger" role="alert">
								<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-remove"></span>
									<?php echo e(Session::get('message-delete-employee')); ?>

							</div>
							<?php endif; ?>
							<?php if(Session::has('message-activate-employee')): ?>
							<div class="alert alert-info" role="alert">
								<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-ok"></span>
									<?php echo e(Session::get('message-activate-employee')); ?>

							</div>
							<?php endif; ?>
						</div>
				</div>

				<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 padding0 add-employee">
					<h3><?php echo e(trans('configuration.addEmployee')); ?></h3>

					<form id="user-registration-form" class="form-horizontal" role="form" method="POST" action="<?php echo e(route('registerEmployee')); ?>">
						<?php echo e(csrf_field()); ?>

						<div class="row form-content">
							
							<div class="form-group-input-field form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
								<div class="col-xs-12 col-sm-12 padding0">
									<label for="name" class="login-label-icon col-xs-3 padding0">
										<?php echo e(trans('user.userName')); ?>

									</label>
									<div class="col-xs-9 padding0">
										<input id="name" type="name" class="form-control1" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(trans('login.name')); ?>" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 padding0">
								<?php if($errors->has('name')): ?>
									<span class="help-block text-center">
										<strong><?php echo e($errors->first('name')); ?></strong>
									</span>
								<?php endif; ?>
								</div>
							</div>

							
							<div class="form-group-input-field form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								<div class="col-xs-12 col-sm-12 padding0">
									<label for="email" class="login-label-icon col-xs-3 padding0">
										<?php echo e(trans('user.userEmail')); ?>

									</label>
									<div class="col-xs-9 padding0">
										<input id="email" type="email" class="form-control1" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('login.email')); ?>" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 padding0">
								<?php if($errors->has('email')): ?>
									<span class="help-block text-center">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
								<?php endif; ?>
								</div>
							</div>

							
							<div class="form-group-input-field form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
								<div class="col-xs-12 col-sm-12 padding0">
									<label for="password" class="login-label-icon col-xs-3 padding0">
										<?php echo e(trans('user.userPassword')); ?>

									</label>
									<div class="col-xs-9 padding0">
										<input data-character-set="a-z,A-Z,0-9,#" rel="gp" id="password" type="text" class="form-control1" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(trans('login.password')); ?>" >
										<a title="<?php echo e(trans('default.generateNewPassword')); ?>" class="default-button getNewPass">
											<span class="fa fa-refresh"></span>
										</a>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 padding0">
								<?php if($errors->has('password')): ?>
									<span class="help-block text-center">
										<strong><?php echo e($errors->first('password')); ?></strong>
									</span>
								<?php endif; ?>
								</div>
							</div>

							
							<div class="form-group-input-field form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
								<div class="col-xs-12 col-sm-12 padding0">
									<label for="address" class="login-label-icon col-xs-3 padding0">
										<?php echo e(trans('user.userAddress')); ?>

									</label>
									<div class="col-xs-9 padding0">
										<input id="address" type="text" class="form-control1" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('login.address')); ?>" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 padding0">
								<?php if($errors->has('address')): ?>
									<span class="help-block text-center">
										<strong><?php echo e($errors->first('address')); ?></strong>
									</span>
								<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="row form-submit">
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 text-right">
									<button id="register-employee" class="default-button">
										<?php echo e(trans('default.add')); ?>

									</button>
								</div>
							</div>
						</div>

					</form>
				</div>

				<?php if (! ($inactive_employees->isEmpty())): ?>
					<div style="margin-top: 50px;" class="col-xs-12 padding0 employees">
						<h3><?php echo e(trans('configuration.listDeactivatedEmployees')); ?></h3>

						<div class="row default-div-table">
							<div class="row default-div-table-header">
								<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?>">
									<strong><?php echo e(trans('user.userName')); ?></strong>http://Wine360/fuel
								</div>
								<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?> text-center">
									<strong><?php echo e(trans('user.userEmail')); ?></strong>
								</div>
								<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
									<div class="col-xs-4 text-center">
										<strong><?php echo e(trans('default.action')); ?></strong>
									</div>
								<?php endif; ?>
							</div>

							<?php $__currentLoopData = $inactive_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="row default-div-table-rows">
									<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?>">
										<span class="vertical-align-center"><?php echo e($employee->name); ?></span>
									</div>
									<div class="<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?> col-xs-4 <?php endif; ?> <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> col-xs-6 <?php endif; ?> text-center">
										<span class="vertical-align-center"><?php echo e($employee->email); ?></span>
									</div>

									<?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
										<div class="col-xs-4 text-right padding0">
											<a data-em="<?php echo e($employee->id); ?>" class="default-button activate-employee-model">
												<span class="glyphicon glyphicon-ok" style="vertical-align:-1px;"></span>
											</a>
										</div>

										<div class="modal" id="activate-employee-model-<?php echo e($employee->id); ?>" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content model-content-activate">
													<div class="modal-header modal-header-activate">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h4 class="modal-title model-title-activate"><?php echo e(trans('configuration.confirmActivationTitle')); ?></h4>
													</div>
													<div class="modal-body">
														<div class="row marginTop">
															<p><?php echo e(trans('configuration.activateConfirmationText')); ?> <?php echo e($employee->name); ?>?</p>
														</div>
													</div>
														<div class="modal-footer">
															<form method="POST" action="<?php echo e(route('activate.employee', [$employee->id])); ?>">
																<?php echo e(csrf_field()); ?>


																<button title="<?php echo e(trans('default.removeEmployee')); ?> <?php echo e($employee->name); ?>" type="submit" class="btn gumb">
																	<?php echo e(trans('default.confirmActivationButton')); ?>

																</button>
															</form>

															<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
														</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
	$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);

	$(window).resize(function () {
		$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);
	});

	if ($('.config-message > div > div').css('display') == 'block') {
		setTimeout(function () {
				$('.config-message > div > div').hide();
			},6000);
	}
	if ($('.add-employee-message > div > div').css('display') == 'block') {
		setTimeout(function () {
				$('.add-employee-message > div > div').hide();
			}, 6000);
	}

	$('.remove-employee-model').on('click', function (e) {
		e.preventDefault();
		$('#remove-employee-model-'+$(this).data('em')).modal({ backdrop: 'static', keyboard: false });
	});

	$('.activate-employee-model').on('click', function (e) {
		e.preventDefault();
		$('#activate-employee-model-'+$(this).data('em')).modal({ backdrop: 'static', keyboard: false });
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const vehicleGroupSelect = document.querySelector('select[name="vehicleGroup"]');
    const subcategoryContainer = document.getElementById('subcategoryContainer');

	function deleteSubcategory(selectedValue, subcategoryId) {
		axios.delete(`/configuration/subcategory/destroy/${subcategoryId}`)
			.then(response => {
				// Ovdje možete dodati logiku za ažuriranje prikaza subkategorija nakon brisanja
				updateSubcategories(selectedValue);
			})
			.catch(error => {
				console.error(error);
			});
	}

	function updateSubcategories(selectedValue) {
		axios.get(`/configuration/subcategory/${selectedValue}`)
			.then(response => {
				subcategoryContainer.innerHTML = '';
				
				var subcategories = Array.isArray(response.data) ? response.data : Object.values(response.data);
				subcategories = subcategories[0];
				subcategories.forEach(subcategory => {
					const subcategoryRow = document.createElement('div');
					subcategoryRow.classList.add('row'); 
					subcategoryRow.style.marginBottom = '5px';
					// Prvi stupac za naziv
					const subcategoryNameColumn = document.createElement('div');
					subcategoryNameColumn.classList.add('col-md-6');

					// Drugi stupac za gumb "Izbriši"
					const deleteColumn = document.createElement('div');
					deleteColumn.classList.add('col-md-6');

					const subcategoryElement = document.createElement('div');
					const subcategoryName = Array.isArray(subcategory) ? subcategory.data.name : subcategory.name;
					subcategoryElement.textContent = subcategoryName;

					// Dodajte <a> element za brisanje s Bootstrap klasom btn-danger i btn-sm za manju veličinu
					const deleteLink = document.createElement('a');
					deleteLink.textContent = 'Izbriši';
					deleteLink.href = '#';
					deleteLink.classList.add('btn', 'btn-danger', 'btn-sm'); // Dodajte Bootstrap klasu

					deleteLink.addEventListener('click', function (e) {
						e.preventDefault();
						deleteSubcategory(selectedValue, subcategory.id);
					});

					subcategoryNameColumn.appendChild(subcategoryElement);
					deleteColumn.appendChild(deleteLink);

					subcategoryRow.appendChild(subcategoryNameColumn);
					subcategoryRow.appendChild(deleteColumn);
					subcategoryContainer.appendChild(subcategoryRow);
				});

				addAddSubcategoryLink(selectedValue);
			})
			.catch(error => {
				console.error(error);
			});
	}

	function createSubcategoryForm(selectedValue) {

		const addSubcategoryLink = subcategoryContainer.querySelector('.add-subcategory-link');
		if (addSubcategoryLink) {
			addSubcategoryLink.remove();
		}

		const subcategoryRow = document.createElement('div');
		subcategoryRow.classList.add('row', 'mb-2'); 

		const subcategoryForm = document.createElement('form');
		subcategoryForm.classList.add('form-inline');

		const nameInputColumn = document.createElement('div');
		nameInputColumn.classList.add('col-md-7'); 

		const nameLabel = document.createElement('label');
		nameLabel.classList.add('sr-only');
		nameLabel.textContent = 'Name:';

		const nameInput = document.createElement('input');
		nameInput.classList.add('form-control', 'mr-2');
		nameInput.setAttribute('type', 'text');
		nameInput.setAttribute('name', 'name');

		const spacerColumn = document.createElement('div');
		spacerColumn.classList.add('col-md-2'); 

		const saveLinkColumn = document.createElement('div');
		saveLinkColumn.classList.add('col-md-2'); 

		const saveLink = document.createElement('a');
		saveLink.textContent = 'Spremi';
		saveLink.href = '#';
		saveLink.classList.add('btn', 'btn-success'); 

		saveLink.addEventListener('click', function (e) {
			e.preventDefault();
			const newSubcategoryName = nameInput.value;
			if (newSubcategoryName.trim() !== '') {
				axios.post(`/configuration/subcategory/store/${selectedValue}`, {
					name: newSubcategoryName
				})
					.then(response => {
						nameInput.value = '';
						updateSubcategories(selectedValue);
					})
					.catch(error => {
						console.error(error);
					});
			}
		});

		nameInputColumn.appendChild(nameLabel);
		nameInputColumn.appendChild(nameInput);

		saveLinkColumn.appendChild(saveLink);

		subcategoryForm.appendChild(nameInputColumn);
		subcategoryForm.appendChild(spacerColumn); // Dodajte prazan stupac
		subcategoryForm.appendChild(saveLinkColumn);

		subcategoryRow.appendChild(subcategoryForm);
		subcategoryContainer.appendChild(subcategoryRow);
	}

	function addAddSubcategoryLink(selectedValue) {
		const addSubcategoryLink = document.createElement('a');
		addSubcategoryLink.textContent = '+ Podkategorija';
		addSubcategoryLink.href = '#';
		addSubcategoryLink.classList.add('btn', 'btn-success', 'add-subcategory-link'); 

		addSubcategoryLink.addEventListener('click', function (e) {
			e.preventDefault();
			createSubcategoryForm(selectedValue);
		});

		subcategoryContainer.appendChild(addSubcategoryLink);
	}


    vehicleGroupSelect.addEventListener('change', function () {
        const selectedValue = vehicleGroupSelect.value;
        if (selectedValue !== '') {
            updateSubcategories(selectedValue);
        } else {
            subcategoryContainer.innerHTML = '';
        }
    });

	// Odmah nakon učitavanja stranice, pozovite updateSubcategories s trenutnom vrijednošću selecta
	document.addEventListener('DOMContentLoaded', function () {
		const selectedValue = vehicleGroupSelect.value;
		if (selectedValue !== '') {
			updateSubcategories(selectedValue);
		}
	});

	// Dodajte event listener za promjenu u select elementu
	vehicleGroupSelect.addEventListener('change', function () {
		const selectedValue = vehicleGroupSelect.value;

		if(selectedValue == "2"){
			$('.vehicleGroupSubcategory').css('display', 'none');
		}else if (selectedValue !== '') {
			$('.vehicleGroupSubcategory').css('display', '');
			updateSubcategories(selectedValue);
		} else {
			subcategoryContainer.innerHTML = '';
		}
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/configuration/index.blade.php ENDPATH**/ ?>