
<div class="modal" id="malfunction-details-model">
	<div class="modal-dialog modal-lg modal-custom">
		<div class="modal-content model-content-update">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('damage.damageDetailsTitle')); ?></h2>
            </div>

			<div class="details-csrf"><?php echo e(csrf_field()); ?></div>

			<div class="modal-body">
			<form id="malfunction-update-form" method="POST" action="<?php echo e(route('vehicles.damage')); ?>" enctype="multipart/form-data">
				<div style="padding: 0; padding-bottom: 30px;" class="modal-body">
					<div class="row">
						<?php echo e(csrf_field()); ?>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="col-xs-12 col-sm-6">
									<div class="col-xs-12 padding0">
										<label><?php echo e(trans('damage.imageBeforeTitle')); ?></label>
									</div>
									<div class="col-xs-12 col-sm-12 padding0">
										<div id="image-preview-container" class="default-no-img-vehicle-modal" style=" height: 150px; background-color: #DFDFDF; width: 80%;  border-radius: 10px; text-align: center; overflow: hidden;">
											<label class="popup-crop-modal-update" for="vehicle-image" style="cursor: pointer; width:300px">
												 <img id="image-preview" src="<?php echo e(url('/img/interface/add-icon.svg')); ?>" alt="Add Icon" style="width: 150px; height:150px"> 
											</label>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="col-xs-12 padding0">
										<label><?php echo e(trans('damage.imageAfterTitle')); ?></label>
									</div>
									<div class="col-xs-12 padding0 image-after-div">
										<div class="row">
											<div class="default-no-img-vehicle-modal" style=" height: 150px; background-color: #DFDFDF; width: 80%;  border-radius: 10px; text-align: center; ">
												<label class="popup-crop-modal-update" data-pos="after" for="vehicle-damage-image-after">
													<img id="image-preview" src="<?php echo e(url('/img/interface/add-icon.svg')); ?>" alt="Add Icon" style="width: 150px; height:150px">
												</label>
											</div>
											<input class="vehicle-damage-image-before" id="vehicle-damage-image-after" type="hidden" name="vehicle_damage_image_after">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="col-xs-10 col-sm-10">
									<label for="damage_create_reminder"><?php echo e(trans('maintenance.maintenance_create_reminder')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select name="damage_create_reminder" class="form-control1"  id="damage_create_reminder">
											<option value="0">Ne</option>
											<option value="1">Da</option>
										</select>
									</div>
									<div class="form-group">
										<?php if($errors->has('damage_create_reminder')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damage_create_reminder')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageDetailsName"><?php echo e(trans('damage.damageName')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-required form-control1" type="text" name="damageDetailsName" id="damageDetailsName-edit" value="" />
									</div>
									<div class="form-group">
										<?php if($errors->has('damageDetailsName')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageDetailsName')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 padding0">
								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
									<div class="col-xs-10 col-sm-10">
										<label for="vehicle-group-select"><?php echo e(trans('vehicles.vehicleGroup')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select name="vehicle-group-select" id="vehicle-group-select-edit" class="form-control1 vehicle-group-select">
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
											<select name="subcategoiry-select" id="subcategoiry-select-edit" class="form-control1 subcategoiry-select">
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
									<label><?php echo e(trans('damage.damageVozilo')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input style="display: none;" id="filter-vehicles-list2" class="form-control1" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
										<select style="width: 100%" name="vl2"  id="vehicles-list2-edit" class="form-control1 vehicles-list2" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter">
											<option value="">Sva vozila</option>
											<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> <?php echo e($vehicle->license_plate); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageDetailsDate"><?php echo e(trans('damage.damageDate')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="damageDetailsDate" class="form-required form-control1 date-input" type="text" name="damageDetailsDate" value=""/>
										<span class="input-group-addon">
											<label for="damageDetailsDate">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<div class="form-group">
										<?php if($errors->has('damageDetailsDate')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageDetailsDate')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageDetailsEndDate"><?php echo e(trans('damage.damageEndDate')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="damageDetailsEndDate" class=" form-control1 datetime-input" type="text" name="damageDetailsEndDate" value=""/>
										<span class="input-group-addon">
											<label for="damageDetailsEndDate">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<div class="form-group">
										<?php if($errors->has('damageDetailsEndDate')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageDetailsEndDate')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageDetails"><?php echo e(trans('damage.damageDetails')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<textarea class="form-control1" name="damageDetails" id="damageDetails"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							

							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label class="control-label" for="damage-image-position"><?php echo e(trans('damage.damageImagePosition')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select class="form-control1 text-left" type="text" name="damage_image_position_modal" id="damage-image-position-modal">
											<option value="0">Ostalo</option>
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageKilometersTraveled"><?php echo e(trans('damage.damageKilometersTraveled')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-control1" type="text" name="damageKilometersTraveled" id="damageKilometersTraveled" value="" />
									</div>
									<div class="form-group">
										<?php if($errors->has('damageKilometersTraveled')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageKilometersTraveled')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label><?php echo e(trans('damage.priority')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select class="form-control1" name="damagePriority" id="damagePriority">
											<option value="">-</option>
											<?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($priority->id); ?>" ><?php echo e($priority->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="form-group">
										<?php if($errors->has('damageKilometersTraveled')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageKilometersTraveled')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageCostNeto"><?php echo e(trans('damage.damageCost_neto')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-control1" type="text" name="damage_cost_neto" id="damage-cost-neto-edit" value="" />
									</div>
									<div class="form-group">
										<?php if($errors->has('damageCostNeto')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageCostNeto')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageCostVAT"><?php echo e(trans('damage.damageCost_vat')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-control1" type="text" name="damage_cost_vat" id="damage-cost-vat-edit" value="25" />
									</div>
									<div class="form-group">
										<?php if($errors->has('damageCostVAT')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageCostVAT')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="damageCostBruto"><?php echo e(trans('damage.damageCost_bruto')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-control1" type="text" name="damage_cost_bruto" id="damage-cost-bruto-edit"/>
									</div>
									<div class="form-group">
										<?php if($errors->has('damageCostBruto"')): ?>
										<span class="help-block text-left">
											<strong><?php echo e($errors->first('damageCostBruto"')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-xs-10 col-sm-10">
								<div style="display: none;" class="alert alert-danger" role="alert">
									<?php echo e(trans('damage.fieldRequired')); ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
					<?php if(Auth::user()->ownsAnyVehicle()): ?>
						<div class="col-xs-12 padding0 text-center">
							<button type="submit" class="btn gumb"><?php echo e(trans('default.save')); ?></button>
						</div>
					<?php endif; ?>
					<?php endif; ?>
	
					<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
					<div class="col-xs-12 padding0 text-center">
						<button type="submit" class="btn gumb"><?php echo e(trans('default.save')); ?></button>
					</div>
					<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script>
		
	

		// Dohvaćanje elemenata input polja
		var netoInput = $('#damage-cost-neto-edit');
		var vatPercentInput = $('#damage-cost-vat-edit');
		var brutoInput = $('#damage-cost-bruto-edit');
		
		// Osluškivanje promjena u netoInput polju
		netoInput.on('input', updateBrutoValue);
		// Osluškivanje promjena u vatPercentInput polju
		vatPercentInput.on('input', updateBrutoValue);

		// Funkcija za ažuriranje vrijednosti u brutoInput polju
		function updateBrutoValue() {
			// Dohvaćanje vrijednosti iz netoInput i vatPercentInput polja
			var netoValue = parseFloat(netoInput.val()) || 0;
			var vatPercent = parseFloat(vatPercentInput.val()) || 0;
			// Izračunavanje bruto vrijednosti
			var brutoValue = netoValue * (1 + vatPercent / 100);
			// Postavljanje izračunate vrijednosti u brutoInput polje
			brutoInput.val(brutoValue.toFixed(2)); // Postavljanje na dvije decimale
		}
 
		
		$('#vehicle-group-select-edit').on('change', function () {
    	var selectedGroupId = $(this).val();
    	// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
		$.ajax({
			url: "<?php echo e(route('vehicles_list_by_group')); ?>",
			method: 'GET',
			data: { group_id: selectedGroupId },
			success: function (data, selectedGroupId) {
				var $vehiclesList2 = $('#vehicles-list2-edit');
				var $subcategorySelect = $('#subcategoiry-select-edit');

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
				
			},
			error: function (error) {
				console.error(error);
			}
		});
	});

	$('#subcategoiry-select-edit').on('change', function () {
		var group_id = $('#vehicle-group-select-edit').val();
		var subcategory_id = $(this).val();

		// Clear previous options in the #vehicles-list2 select
		$('.vehicles-list2-edit').empty();

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
			$('#vehicles-list2-edit').prepend($('<option>', {
				value: '', 
				text: 'Sva vozila' 
			}));
			$.each(data, function (index, vehicle) {
				// Append new options to the #vehicles-list2 select
				$('.vehicles-list2-edit').append($('<option>', {
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
<?php /**PATH C:\Projekti\Wine360\resources\views/damage/editModal.blade.php ENDPATH**/ ?>