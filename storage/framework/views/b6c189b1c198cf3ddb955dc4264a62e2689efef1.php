<div class="modal" id="editMaintenceModal"  role="dialog" aria-labelledby="addMaintenceModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-custom">
		<div class="modal-content model-content-update">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h3 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('maintenance.DetailsTitle')); ?></h3>
            </div>
			<div class="details-csrf"><?php echo e(csrf_field()); ?></div>
			<div class="modal-body">
				
		</div>
			<form id="malfunction-update-form" method="POST" action="<?php echo e(route('vehicles.maintenance')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div style="padding: 0; padding-bottom: 30px;" class="modal-body">
					<div class="row">
						<div class="row">
							<div class="modal-status text-right col-xs-12 col-sm-12"></div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="maintenanceDetailsName"><?php echo e(trans('malfunction.malfunctionName')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-required form-control1" type="text" name="maintenanceDetailsName" id="maintenanceDetailsName" value="" />
									</div>
									<?php if($errors->has('maintenanceDetailsName')): ?>
										<div class="form-group">
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('maintenanceDetailsName')); ?></strong>
											</span>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
									<div class="col-xs-10 col-sm-10">
										<label class="control-label" for="vehicleGroup"><?php echo e(trans('vehicles.vehicleGroup')); ?></label>
									</div>
								<?php endif; ?>
									<div class="col-xs-10 col-sm-10" <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?> style="display:none;" <?php endif; ?>>
										<select name="vehicleGroup" class="form-control1 vehicle-group-select">
											<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value=<?php echo e($vehicleGroup->id); ?> <?php if(Auth::user()->configuration->vehicle_group_id == $vehicleGroup->id): ?> selected <?php endif; ?> ><?php echo e($vehicleGroup->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
										</select>							
									</div>
									<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
									<div class="col-xs-10 col-sm-10">
										<label class="control-label" for="supplier-city"><?php echo e(trans('kilometers.subcategory')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<select name="subcategoiry-select" class="form-control1 subcategoiry-select">
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
								<?php endif; ?>
								<div class="col-xs-10 col-sm-10">
                                    <label for="vehicles-list"><?php echo e(trans('malfunction.malfunctionVozilo')); ?></label>
                                </div>
                                <div class="col-xs-10 col-sm-10">
                                    <select style="width: 100%" name="vl2[]" id="vl2" class="form-control1 vehicles-list2 select2" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" multiple>
										<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($vehicle->id); ?>" class="vehiclesOption"><?php echo e($vehicle->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
								
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="maintenanceDetailsDate"><?php echo e(trans('malfunction.malfunctionDate')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="maintenanceDetailsDate" class="form-required form-control1 date-input" type="text" name="maintenanceDetailsDate" value=""/>
										<span class="input-group-addon">
											<label for="maintenanceDetailsDate">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<?php if($errors->has('maintenanceDetailsDate')): ?>
										<div class="form-group">
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('maintenanceDetailsDate')); ?></strong>
											</span>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="maintenanceDetailsEndDate"><?php echo e(trans('malfunction.malfunctionEndDate')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="maintenanceDetailsEndDate" class=" form-control1 datetime-input" type="text" name="maintenanceDetailsEndDate" value=""/>
										<span class="input-group-addon">
											<label for="maintenanceDetailsEndDate">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<?php if($errors->has('maintenanceDetailsEndDate')): ?>
										<div class="form-group">
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('maintenanceDetailsEndDate')); ?></strong>
											</span>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="maintenanceDetails"><?php echo e(trans('malfunction.malfunctionDetails')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<textarea class="form-control1" name="maintenanceDetails" id="maintenanceDetails"></textarea>
									</div>
								</div>
							</div>

							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label class="control-label" for="malfunction-image-position"><?php echo e(trans('malfunction.malfunctionImagePosition')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select class="form-control1 text-left" type="text" name="malfunction_image_position_modal" id="malfunction-image-position-modal">
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
									<label for="maintenanceKilometersTraveled"><?php echo e(trans('malfunction.malfunctionKilometersTraveled')); ?></label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<input class="form-control1" type="text" name="maintenanceKilometersTraveled" id="maintenanceKilometersTraveled" value="" />
									</div>
									<?php if($errors->has('maintenanceKilometersTraveled')): ?>
										<div class="form-group">
											<span class="help-block text-left">
												<strong><?php echo e($errors->first('maintenanceKilometersTraveled')); ?></strong>
											</span>
										</div>
									<?php endif; ?>
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
											<select class="form-control1" name="maintenancePriority" id="maintenancePriority">
												<option value="">-</option>
												<?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($priority->id); ?>" ><?php echo e($priority->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
										<?php if($errors->has('maintenanceKilometersTraveled')): ?>
											<div class="form-group">
												<span class="help-block text-left">
													<strong><?php echo e($errors->first('maintenanceKilometersTraveled')); ?></strong>
												</span>
											</div>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label for="malfunctionCostNeto"><?php echo e(trans('malfunction.malfunctionCost_neto')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<input class="form-control1" type="text" name="maintenance_cost_neto" id="malfunctionCostNeto" value="" />
										</div>
										<?php if($errors->has('malfunctionCostNeto')): ?>
											<div class="form-group">
												<span class="help-block text-left">
													<strong><?php echo e($errors->first('malfunctionCostNeto')); ?></strong>
												</span>
											</div>
										<?php endif; ?>
									</div>
								</div>
								
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label for="malfunctionCostVAT"><?php echo e(trans('malfunction.malfunctionCost_vat')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<input class="form-control1" type="text" name="maintenance_cost_vat" id="malfunctionCostVAT" value="" />
										</div>
										<?php if($errors->has('malfunctionCostVAT')): ?>
											<div class="form-group">
												<span class="help-block text-left">
													<strong><?php echo e($errors->first('malfunctionCostVAT')); ?></strong>
												</span>
											</div>
										<?php endif; ?>
									</div>
								</div>
								
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label for="malfunctionCostBruto"><?php echo e(trans('malfunction.malfunctionCost_bruto')); ?></label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<input class="form-control1" type="text" name="maintenance_cost_bruto" id="malfunctionCostBruto" value="" />
										</div>
										<?php if($errors->has('malfunctionCostBruto"')): ?>
											<div class="form-group">
												<span class="help-block text-left">
													<strong><?php echo e($errors->first('malfunctionCostBruto"')); ?></strong>
												</span>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="maintenance_cost_bruto"><?php echo e(trans('maintenance.maintenance_create_reminder')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <select name="maintenance_create_reminder" class="form-control1"  id="maintenance_create_reminderEdit">
                                                    <option value="0">Ne</option>
                                                    <option value="1">Da</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('maintenance_create_reminder')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenance_create_reminder')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none" id="recurring_reminderEdit">
                                    <div class="col-xs-12 padding0">
                                        <div class="col-xs-10 col-sm-10">
                                            <label><?php echo e(trans('reminder.recurring')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <select class="form-control1" name="recurring_reminder_id" id="recurring_reminder_id">
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
                                </div>

								<div class="col-xs-10 col-sm-10">
									<div style="display: none;" class="alert alert-danger" role="alert">
										<?php echo e(trans('malfunction.fieldRequired')); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; justify-content: center; align-items: center; ,margin-top:15px;">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-3">
								<input id="submit-update-malfunction" type="submit" class=" submit-update-malfunction btn  gumbSpremi" value="<?php echo e(trans('default.save')); ?>">
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-3">
								<button type="button"  class="btn  gumbZatvori" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    // Dohvaćanje elemenata input polja
	var netoInput = $('#malfunction-cost-neto');
	var vatPercentInput = $('#malfunction-cost-vat');
	var brutoInput = $('#malfunction-cost-bruto');
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
	

	$(document).ready(function(){

    // Na promjenu prvog select elementa
    $('#maintenance_create_reminderEdit').change(function(){
        // Provjerimo je li odabran 'Da'
        if($(this).val() == '1'){
            // Ako je odabran 'Da', uklonimo klasu 'd-none' s elementa za ponavljajući podsjetnik
            $('#recurring_reminderEdit').removeClass('d-none');
        } else {
            // Inače, dodamo klasu 'd-none' da sakrijemo element
            $('#recurring_reminderEdit').addClass('d-none');
        }
    });
});


</script>
<?php /**PATH C:\Projekti\Wine360\resources\views/maintenance/editModal.blade.php ENDPATH**/ ?>