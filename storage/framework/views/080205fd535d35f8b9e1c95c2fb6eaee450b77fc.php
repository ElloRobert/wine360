

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
								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
									<div class="col-xs-10 col-sm-10">
										<label for="vehicle-group-selectr"><?php echo e(trans('vehicles.vehicleGroup')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select name="vehicle-group-select" class="form-control1 vehicle-group-select" id="reminder-vehicle-group-select-edit">
												<option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
												<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-xs-10 col-sm-10">
											<label for="subcategoiry-select"><?php echo e(trans('vehicles.subcategory')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select name="subcategoiry-select" id="reminder-subcategoiry-select-edit" class="form-control1">
												<?php if($subcategory != 0): ?>
													<option value="">Odaberite podkategoriju vozila</option>
													<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
													<option value="">Ne postoje podkategorije</option>
												<?php endif; ?>
											</select>
										</div>
									</div>
								<?php endif; ?>
								<div class="col-xs-10 col-sm-10">
									<label for="malfunction_create_reminder"><?php echo e(trans('vehicles.chooseVehicle')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<input style="display: none;" id="filter-vehicles-list2" class="form-contro1l" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
									<select style="width: 100%" name="vl" id="reminder-vehicles-list2-edit" class="form-control1" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter">
										<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
										<option value="">Odaberite vozilo</option>
										<?php endif; ?>
										<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> <?php echo e($vehicle->license_plate); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label class="control-label" for="malfunction-image-position"><?php echo e(trans('malfunction.malfunctionImagePosition')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select class="form-control1 text-left" type="text" name="edit_reminder_category" id="edit_reminder_category">
												<option value="0">Ostalo</option>
												<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
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

	$('.vehicle-group-select').on('change', function () {
    	var selectedGroupId = $(this).val();
    	// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
		$.ajax({
			url: "<?php echo e(route('vehicles_list_by_group')); ?>",
			method: 'GET',
			data: { group_id: selectedGroupId },
			success: function (data, selectedGroupId) {
				var $vehiclesList2 = $('.vehicles-list2');
				var $subcategorySelect = $('.subcategoiry-select');

				// Clear and update the options in the #vehicles-list2 select.
				$vehiclesList2.empty();
				$.each(data.vehicles_list, function (index, vehicle) {
					$vehiclesList2.append($('<option>', {
						value: vehicle.id,
						text: vehicle.text
					}));
				});

				// Clear and update the options in the #subcategoiry-select select.
				$subcategorySelect.empty();
				$subcategorySelect.append($('<option>', {
					value: 0,
					text: 'Odaberite podkategoriju'
				}));
				
				$.each(data.subcategory, function (index, subcat) {
					$subcategorySelect.append($('<option>', {
						value: subcat.id,
						text: subcat.name
					}));
				});
				
				selectedGroupId = $('.vehicle-group-select').val();
				if(selectedGroupId == 0){
					location.reload(true);
					
				}else{
					$vehiclesList2.trigger('change');
					$subcategorySelect.trigger('change');
				}
			},
			error: function (error) {
				console.error(error);
			}
		});
	});

	$('.subcategoiry-select').on('change', function () {
		var group_id = $('.vehicle-group-select').val();
		var subcategory_id = $(this).val();

		// Clear previous options in the #vehicles-list2 select
		$('.vehicles-list2').empty();

		console.log(subcategory_id, group_id);

		// Make an Axios request instead of using select2
		axios.get("<?php echo e(route('autocomplete.vehicles_list')); ?>", {
			params: {
				vl: '',
				u: $('#u').val(),
				group_id: group_id,
				subcategory_id: subcategory_id
			}
		})
		.then(function (response) {
			// Process the results and update UI as needed
			var data = response.data;

			// Assuming you have an element to display the results, update it accordingly
			// For example, if you have a div with id 'results-container'
			var resultsContainer = $('.results-container');
			resultsContainer.empty();
			$('.vehicles-list2').prepend($('<option>', {
				value: '', 
				text: 'Sva vozila' 
			}));
			$.each(data, function (index, vehicle) {
				// Append new options to the #vehicles-list2 select
				$('.vehicles-list2').append($('<option>', {
					value: vehicle.id,
					text: vehicle.text 
				}));
			});
		})
		.catch(function (error) {
			console.error(error);
		});
	});
</script>

<?php /**PATH C:\Projekti\Wine360\resources\views/reminder/editModal.blade.php ENDPATH**/ ?>