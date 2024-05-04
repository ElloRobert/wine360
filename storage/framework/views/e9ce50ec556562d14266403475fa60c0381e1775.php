

<div class="modal" id="addMaintenanceModal"  role="dialog" aria-labelledby="addMaintenceModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('maintenance.insertMaintenance')); ?></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="malfunction-store-form" method="POST" action="<?php echo e(route('vehicles.maintenance.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-xs-12 col-sm-6 padding0">
                            <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10">
                                            <label class="control-label" for="vehicleGroup"><?php echo e(trans('vehicles.vehicleGroup')); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10">
                                            <select name="vehicleGroup" class="form-control1 vehicle-group-select-maintenance">
                                                <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value=<?php echo e($vehicleGroup->id); ?> <?php if(Auth::user()->configuration->vehicle_group_id == $vehicleGroup->id): ?> selected <?php endif; ?> ><?php echo e($vehicleGroup->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </select>							
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="supplier-city"><?php echo e(trans('kilometers.subcategory')); ?></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10">
                                            <select name="subcategoiry-select" class="form-control1 subcategory-select-maintenance">
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
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xs-10 col-sm-10">
                                    <label for="vehicles-list"><?php echo e(trans('malfunction.malfunctionVozilo')); ?></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-10 col-sm-10">
                                        <input style="display: none;" id="filter-vehicles-list2" class="form-control1" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
                                        <select style="width: 100%" name="vl[]" class="form-control1 vehicles-list2 select2" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" multiple>
                                            <?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> <?php echo e($vehicle->license_plate); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="malfunction-image-position"><?php echo e(trans('malfunction.malfunctionImagePosition')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control1 text-left" type="text" name="malfunction_image_position" id="malfunction-image-position">
                                                <option value="0">Ostalo</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div <?php if(isset($_GET['v']) && isset($_GET['p'])) echo 'style="display: none;"' ?>>
                                            <label class="control-label" for="add-malfunction-category"><?php echo e(trans('malfunction.addMalfunctionCategory')); ?></label>
                                            <div class="form-group">
                                                <input id="add-malfunction-category" class="form-control1 add-malfunction-category" type="text" name="add_malfunction_category" value="<?php echo e(old('add_malfunction_category')); ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="malfunction-name"><?php echo e(trans('malfunction.malfunctionName')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="malfunction-name" class="form-control1" type="text" name="malfunction_name" value="<?php echo e(old('malfunction_name')); ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('malfunction_name')): ?>
                                                    <span class="help-block text-left">
                                                        <strong><?php echo e($errors->first('malfunction_name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10">
                                        <label for="malfunction-details"><?php echo e(trans('malfunction.malfunctionDetails')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="form-group">
                                            <textarea rows="5" id="malfunction-details" class="form-control1" type="text" name="malfunction_details" value="<?php echo e(old('malfunction_details')); ?>"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <?php if($errors->has('malfunction_details')): ?>
                                            <span class="help-block text-left">
                                                <strong><?php echo e($errors->first('malfunction_details')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="malfunction-date"><?php echo e(trans('malfunction.malfunctionDate')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group input-group date">
                                                <input id="malfunction-date" class="form-control1 date-input" type="text" name="malfunction_date" value="<?php echo e(old('malfunction_date', Carbon\Carbon::now()->format('d.m.Y.'))); ?>"/>
                                                <span class="input-group-addon">
                                                    <label for="malfunction-date">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </label>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('malfunction_date')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('malfunction_date')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="malfunction-end-date"><?php echo e(trans('malfunction.malfunctionEndDate')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group input-group date">
                                                <input id="maintenance-end-date" class="form-control1" type="date" name="maintenance_end_date" value="<?php echo e(old('maintenance_end_date')); ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('maintenance_end_date')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenance_end_date')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 padding0">
                                            <?php if($errors->has('vehicles_color')): ?>
                                                <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('vehicles_color')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label><?php echo e(trans('malfunction.malfunctionKilometersTraveled')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                                <?php
                                                $v_current = 0;
                                                if (isset($_GET['v'])) {
                                                    $v = App\Vehicle::find($_GET['v']);
                                                    $v_fuel_km = 0;
                                                    $v_malfunction_km = 0;
            
                                                    if ($v->vehiclesFuel->sortByDesc('current_kilometers')->first() != NULL && $v->vehiclesFuel->sortByDesc('current_kilometers')->first() != '') {
                                                        $v_fuel_km = $v->vehiclesFuel->sortByDesc('current_kilometers')->first()->current_kilometers;
                                                    }
                                                    if ($v->malfunctions->sortByDesc('kilometers_traveled')->first() != NULL) {
                                                        if ($v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled != NULL && $v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled != '') {
                                                            $v_malfunction_km = $v->malfunctions->sortByDesc('kilometers_traveled')->first()->kilometers_traveled;
                                                        }
                                                    }
                                                    if ($v_fuel_km != 0 || $v_malfunction_km != 0) {
                                                        if ($v_fuel_km >= $v_malfunction_km) {
                                                            $v_current = $v_fuel_km;
                                                        } else {
                                                            $v_current = $v_malfunction_km;
                                                        }
                                                    } else {
                                                        $v_current = $v->kilometers;
                                                    }
                                                }
                                                ?>
                                                <input
                                                    class="form-control1"
                                                    type="text"
                                                    name="maintenanceKilometersTraveled" id="maintenanceKilometersTraveled"
                                                    value="<?php echo e(old('maintenanceKilometersTraveled', $v_current)); ?>"
                                                />
                                            
                                            <div class="form-group">
                                                <?php if($errors->has('maintenanceKilometersTraveled')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenanceKilometersTraveled')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="row">
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
                                            <div class="form-group">
                                                <?php if($errors->has('maintenancePriority')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenancePriority')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="malfunction-cost"><?php echo e(trans('malfunction.malfunctionCost_neto')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="malfunction-cost-neto" class="form-control1" type="text" name="maintenance_cost_neto" value="<?php echo e(old('maintenance_cost_neto')); ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('maintenance_cost_neto')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenance_cost_neto')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="malfunction-cost"><?php echo e(trans('malfunction.malfunctionCost_vat')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="malfunction-cost-vat" class="form-control1" type="text" name="maintenance_cost_vat" value="<?php echo e(old('maintenance_cost_vat') ?? 25); ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('maintenance_cost_vat')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenance_cost_vat')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="maintenance_cost_bruto"><?php echo e(trans('malfunction.malfunctionCost_bruto')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="malfunction-cost-bruto" class="form-control1" type="text" name="maintenance_cost_bruto" value="<?php echo e(old('maintenance_cost_bruto')); ?>" readonly/>
                                            </div>
                                            <div class="form-group">
                                                <?php if($errors->has('maintenance_cost_bruto')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('maintenance_cost_bruto')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="maintenance_cost_bruto"><?php echo e(trans('maintenance.maintenance_create_reminder')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <select name="maintenance_create_reminder" class="form-control1"  id="maintenance_create_reminder">
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
                                <div class="row d-none" id="recurring_reminder">
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
                    </div>
            </div>
            <div class="modal-footer" style="margin-top:25px; border: none;">
                <?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
                    <?php if(Auth::user()->ownsAnyVehicle()): ?>
                        <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                            <button type="submit" class="btn gumb"><?php echo e(trans('default.save')); ?></button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
                    <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                        <button type="submit"  class="btn gumb"><?php echo e(trans('default.save')); ?></button>
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

    $('.vehicle-group-select-maintenance').on('change', function () {
        console.log("Tu sma");
        var selectedGroupId = $(this).val();
        //Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
        $.ajax({
            url: "<?php echo e(route('vehicles_list_by_group')); ?>",
            method: 'GET',
            data: { group_id: selectedGroupId },
            success: function (data, selectedGroupId) {
                var $vehiclesList2 = $('.vehicles-list2');
                var $subcategorySelect = $('.subcategory-select-maintenance');
                //Clear and update the options in the #vehicles-list2 select.
                $vehiclesList2.empty();
                $.each(data.vehicles_list, function (index, vehicle) {
                    $vehiclesList2.append($('<option>', {
                        value: vehicle.id,
                        text: vehicle.text
                    }));
                });

                //Clear and update the options in the #subcategory-select select.
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
                    
                selectedGroupId = $('.vehicle-group-select-maintenance').val();
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

	$('.subcategory-select-maintenance').on('change', function () {
		var group_id = $('.vehicle-group-select-maintenance').val();
		var subcategory_id = $(this).val();

		//Clear previous options in the #vehicles-list2 select
		$('.vehicles-list2').empty();

		console.log(subcategory_id, group_id);

		//Make an Axios request instead of using select2
		axios.get("<?php echo e(route('autocomplete.vehicles_list')); ?>", {
			params: {
				vl: '',
				u: $('#u').val(),
				group_id: group_id,
				subcategory_id: subcategory_id
			}
		})
		.then(function (response) {
			//Process the results and update UI as needed
			var data = response.data;

			//Assuming you have an element to display the results, update it accordingly
			//For example, if you have a div with id 'results-container'
			var resultsContainer = $('.results-container');
			resultsContainer.empty();
			$('.vehicles-list2').prepend($('<option>', {
				value: '', 
				text: 'Sva vozila' 
			}));
			$.each(data, function (index, vehicle) {
				//Append new options to the #vehicles-list2 select
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
        // Sakrijemo polje za ponavljajući podsjetnik na početku
        $('#recurring_reminder').addClass('d-none');
        
        // Na promjenu prvog select elementa
        $('#maintenance_create_reminder').change(function(){
            // Provjerimo je li odabran 'Da'
            if($(this).val() == '1'){
                // Ako je odabran 'Da', uklonimo klasu 'd-none' s elementa za ponavljajući podsjetnik
                $('#recurring_reminder').removeClass('d-none');
            } else {
                // Inače, dodamo klasu 'd-none' da sakrijemo element
                $('#recurring_reminder').addClass('d-none');
            }
        });
    });


</script>

<?php /**PATH C:\Projekti\Wine360\resources\views/maintenance/addMaintenanceModal.blade.php ENDPATH**/ ?>