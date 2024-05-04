

<div class="modal" id="editReminderModal" role="dialog" aria-labelledby="editReminderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
				<h3 class="modal-title modal-naslov"><?php echo e(trans('reminder.editReminder')); ?></h3>
            </div>
            <div class="modal-body">	
			<form id="reminder-update-form" method="POST" action="" enctype="multipart/form-data"> 
				<?php echo e(csrf_field()); ?>

				<div style="padding: 0; padding-bottom: 30px;" class="modal-body">
					<div class="row">
						<div class="row">
							<div class="col-xs-12 col-sm-6"> 
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label for="malfunctionDetailsName"><?php echo e(trans('malfunction.malfunctionName')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<input class="form-required form-control1" type="text" name="edit_reminder_name" id="editReminderName" value="" />
										</div>
										<div class="form-group">
											<?php if($errors->has('malfunctionDetailsName')): ?>
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('malfunctionDetailsName')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								</div>
							

								<div class="col-xs-10 col-sm-10">
									<label class="control-label" for="edit-add-reminder-category"><?php echo e(trans('reminder.addReminderCategory')); ?></label>
								<div class="form-group">
									<input id="edit-add-reminder-category" class="form-control1" type="text" name="edit_add_reminder_category" value="<?php echo e(old('add_reminder_category')); ?>"/>
								</div>
								</div>
							</div>
								<div class="col-xs-12 col-sm-6"> 
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label><?php echo e(trans('malfunction.priority')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select class="form-control1" name="editReminderPriority" id="edit_reminder_Priority">
												<option value="">-</option>
												<?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($priority->id); ?>" ><?php echo e($priority->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
										<div class="form-group">
											<?php if($errors->has('malfunctionKilometersTraveled')): ?>
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('malfunctionKilometersTraveled')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<div class="col-xs-12 col-sm-6">
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="malfunctionDetails"><?php echo e(trans('malfunction.malfunctionDetails')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<textarea class="form-control1" name="editReminderDetails" id="editReminderDetails"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="reminder-date"><?php echo e(trans('reminder.reminderDate')); ?></label>
								</div>
	
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="edit-reminder-date" class="form-control1 datetime-input" type="text" name="edit_reminder_date" value="<?php echo e(old('malfunction_date', Carbon\Carbon::now()->format('d.m.Y H:i:s'))); ?>"/>
										<span class="input-group-addon">
											<label for="reminder-date">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<div class="form-group">
										<?php if($errors->has('reminder_date')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('reminder_date')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label><?php echo e(trans('reminder.recurring')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select class="form-control1" name="edit_recurring_reminder_id" id="edit_recurring_reminder_id">
											<option value="0" selected>Ne</option>
											<?php $__currentLoopData = $recurring_reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recurring_reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($recurring_reminder->id); ?>"><?php echo e(trans($recurring_reminder->name)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="form-group">
										<?php if($errors->has('reminderPriority')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('reminderPriority')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-10 col-sm-10">
								<div style="display: none;" class="alert alert-danger" role="alert">
									<?php echo e(trans('malfunction.fieldRequired')); ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
            </div>
				<div class="modal-footer">
					<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
					<?php if(Auth::user()->ownsAnyVehicle()): ?>
						<div class="col-xs-12 padding0 text-right">
							<button type="submit" class="default-button"><?php echo e(trans('default.save')); ?></button>
						</div>
					<?php endif; ?>
					<?php endif; ?>
	
					<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
					<div class="col-xs-12 padding0 text-center">
						<button type="submit" class="btn gumb mt-15"><?php echo e(trans('default.save')); ?></button>
					</div>
					<?php endif; ?>
				</div>
			</form>
    </div>
</div>
</div>

<script>
    		// Dohvaćanje elemenata input polja
		var netoInputAdd = $('#malfunction-cost-neto-add');
		var vatPercentInputAdd = $('#malfunction-cost-vat-add');
		var brutoInputAdd = $('#malfunction-cost-bruto-add');
		// Osluškivanje promjena u netoInput polju
		netoInputAdd.on('input', updateBrutoValueAdd);
		// Osluškivanje promjena u vatPercentInput polju
		vatPercentInputAdd.on('input', updateBrutoValueAdd);

		// Funkcija za ažuriranje vrijednosti u brutoInput polju
		function updateBrutoValueAdd() {
			// Dohvaćanje vrijednosti iz netoInput i vatPercentInput polja
			var netoValueAdd = parseFloat(netoInputAdd.val()) || 0;
			var vatPercentAdd = parseFloat(vatPercentInputAdd.val()) || 0;
			// Izračunavanje bruto vrijednosti
			var brutoValueAdd = netoValueAdd * (1 + vatPercentAdd / 100);
			// Postavljanje izračunate vrijednosti u brutoInput polje
			brutoInputAdd.val(brutoValueAdd.toFixed(2)); // Postavljanje na dvije decimale
		}
</script>

<?php /**PATH C:\Projekti\wine360\resources\views/reminder/editModal.blade.php ENDPATH**/ ?>