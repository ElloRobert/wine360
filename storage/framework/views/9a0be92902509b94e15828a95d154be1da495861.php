

<div class="modal fade" id="addFuelModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('fuel.add')); ?></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form  method="POST" action="<?php echo e(route('vehicles.fuel.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input class="form-control1 text-center" type="text" name="fuel_id" id="fuel_id" value="<?php echo e(old('fuel_id')); ?>" hidden/>
                        <input class="form-control1 text-center" type="text" name="vehicle_id" id="vehicle_id" value="<?php echo e(old('vehicle_id')); ?>" hidden/>
                        <div id="inputPodaciGoriva" class="">
                            <div class="col-xs-12 col-sm-6 padding0">
                             
                                <div class="row">
                                    <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10 marginTop">
                                                <label class="control-label" for="vehicle-group-select"><?php echo e(trans('kilometers.group')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select name="vehicle-group-select" class="form-control1 vehicle-group-select-fuel" id="vehicle-group-select-fuel">
                                                    <option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
                                                    <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10 marginTop">
                                                <label class="control-label" for="subcategoiry-select"><?php echo e(trans('kilometers.subcategory')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select name="subcategoiry-select" class="form-control1 subcategoiry-select-fuel">
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
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10 marginTop">
                                            <label class="control-label" for="vl"><?php echo e(trans('kilometers.vehicle')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input style="display: none;" id="filter-vehicles-list2" class="form-control1" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
                                            <select style="width: 100%" name="vl" id="vl" class="form-control1 vehicles-list2" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter">
                                                <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
                                                    <option value="">Sva vozila</option>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> (<?php echo e($vehicle->license_plate); ?>)</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="control-label vehicle_type"><?php echo e(trans('fuel.vehicle.type')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <select id="vehicle_type" class="form-control1" name="vehicle_type">
                                                    <option value="2" <?php echo e(old('vehicle_type') == 'classic' ? 'selected' : ''); ?>>
                                                        <?php echo e(trans('fuel.vehicle.classic')); ?>

                                                    </option>
                                                    <option value="1" <?php echo e(old('vehicle_type') == 'electric' ? 'selected' : ''); ?>>
                                                        <?php echo e(trans('fuel.vehicle.electric')); ?>

                                                    </option>
                                                </select>
                                            </div>
                                            <?php if($errors->has('vehicle_type')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('vehicle_type')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-10 col-sm-10 classic-vehicle">
                                        <label for="liters" class="control-label"><?php echo e(trans('fuel.amount')); ?>   <?php echo e(trans('fuel.liters')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10 electric-vehicle"  style="display: none;">
                                        <label for="liters" class="control-label"><?php echo e(trans('fuel.amount')); ?>  <?php echo e(trans('fuel.KW')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="form-group">
                                            <input id="liters" class="form-control1" type="text" name="liters" value="<?php echo e(old('liters')); ?>"/>
                                        </div>
                                        <?php if($errors->has('liters')): ?>
                                            <span class="help-block text-left">
                                                <strong><?php echo e($errors->first('liters')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="fuel_neto_cost"><?php echo e(trans('fuel.neto')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="fuel_neto_cost" class="form-control1" type="text" name="fuel_neto_cost" value="<?php echo e(old('fuel_neto_cost')); ?>"/>
                                            </div>
                                            <?php if($errors->has('fuel_neto_cost')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('fuel_neto_cost')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="fuel_vat"><?php echo e(trans('fuel.vat')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="fuel_vat" class="form-control1" type="text" name="fuel_vat" value="<?php echo e(old('fuel_vat') ?? 25); ?>"/>
                                            </div>
                                            <?php if($errors->has('fuel_vat')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('fuel_vat')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="fuel_total_cost"><?php echo e(trans('fuel.total_cost')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="fuel_total_cost" class="form-control1" type="text" name="fuel_total_cost" value="<?php echo e(old('fuel_total_cost') ?? 0); ?>"readonly/>
                                            </div>
                                            <?php if($errors->has('fuel_total_cost')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('fuel_total_cost')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="fuel_place"><?php echo e(trans('fuel.place')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="fuel_place" class="form-control1" type="text" name="fuel_place" value="<?php echo e(old('fuel_place')); ?>"/>
                                            </div>
                                            <?php if($errors->has('fuel_place')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('fuel_place')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="fuel_supplier"><?php echo e(trans('fuel.supplier')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <select class="form-control1 select2" name="fuel_supplier" id="fuel_supplier">
                                                <option value="">- <?php echo e(trans('default.choose')); ?> -</option>
                                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('fuel_supplier')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('fuel_supplier')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10 marginTop">
                                            <label for="file"><?php echo e(trans('fuel.upload_file')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <div class="form-group">
                                                <input id="file" class="form-control1" type="file" name="file" accept="image/*,application/pdf"/>
                                            </div>
                                            <?php if($errors->has('file')): ?>
                                                <span class="help-block text-left">
                                                    <strong><?php echo e($errors->first('file')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
                            <div class="form-group row mt-15">
                                <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                                    <button id="insertEditSubmitAction" class="btn gumb mt-15"><?php echo e(trans('default.save')); ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Dodajte event listener za promenu tipa vozila
	    $('#vehicle_type').on('change', function(){
		    var selectedValue = $(this).val();
			// Sakrijte sva polja za unos
			$('.classic-vehicle, .electric-vehicle').hide();
			// Prikazujemo odgovarajuće polje na osnovu izabranog tipa vozila
			if (selectedValue === '1') {
				$('.electric-vehicle').show();
			} else if (selectedValue === '2') {
				$('.classic-vehicle').show();
			}
		});

		// Pratite promjene u poljima fuel_neto_cost i liters
		$('#fuel_neto_cost, #liters').on('input', function() {
            // Dobijte vrijednosti iz polja
            var fuel_neto_cost = parseFloat($('#fuel_neto_cost').val()) || 0;
            var liters = parseFloat($('#liters').val()) || 0;
            // Dobijte vrijednost iz polja fuel_vat
            var fuel_vat = parseFloat($('#fuel_vat').val()) || 25;
            // Izračunajte fuel_total_cost
            var fuel_total_cost = (fuel_neto_cost * liters) * (1 + fuel_vat / 100);
            // Prikazivanje izračunate vrijednosti u polju fuel_total_cost
            $('#fuel_total_cost').val(fuel_total_cost.toFixed(2));
        });
    });

    $('.vehicle-group-select-fuel').on('change', function () {
    	var selectedGroupId = $(this).val();
    	// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
		$.ajax({
			url: "<?php echo e(route('vehicles_list_by_group')); ?>",
			method: 'GET',
			data: { group_id: selectedGroupId },
			success: function (data, selectedGroupId) {
				var $vehiclesList2 = $('.vehicles-list2');
				var $subcategorySelect = $('.subcategoiry-select-fuel');

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
				
				selectedGroupId = $('.vehicle-group-select-fuel').val();
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

	$('.subcategoiry-select-fuel').on('change', function () {
		var group_id = $('.vehicle-group-select-fuel').val();
		var subcategory_id = $(this).val();
        var vehicle_id = $('#vehicle_id').val();
 
		// Clear previous options in the #vehicles-list2 select
		$('.vehicles-list2').empty();
		// Make an Axios request instead of using select2
		axios.get("<?php echo e(route('autocomplete.vehicles_list')); ?>", {
			params: {
				vl: '',
				u: $('#u').val(),
				group_id: group_id,
				subcategory_id: subcategory_id,
                vehicle_id: vehicle_id
			}
		})
		.then(function (response) {
            // Process the results and update UI as needed
            var data = response.data;
            // Assuming you have an element to display the results, update it accordingly
            // For example, if you have a div with id 'results-container'
            var resultsContainer = $('.results-container');
            resultsContainer.empty();
            // Ovdje dodajte praznu opciju na početak
            $('.vehicles-list2').prepend($('<option>', {
                value: '', 
                text: 'Sva vozila' 
            }));
            $.each(data, function (index, vehicle) {
                // Kreirajte opciju
                var option = $('<option>', {
                    value: vehicle.id,
                    text: vehicle.text 
                });
                // Provjerite je li trenutna opcija ima istu vrijednost kao vehicle_id
                if (vehicle.id == vehicle_id) {
                    // Ako da, označite je kao 'selected'
                    option.prop('selected', true);
                }
                // Dodajte opciju u #vehicles-list2 select
                $('.vehicles-list2').append(option);
            });
        })
		.catch(function (error) {
			console.error(error);
		});
	});

  </script>
  
<?php /**PATH C:\Projekti\wine360\resources\views/fuel/addModal.blade.php ENDPATH**/ ?>