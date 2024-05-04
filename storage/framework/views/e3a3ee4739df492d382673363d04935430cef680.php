

<div class="modal fade" id="addVehicleModal"  role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('kilometers.add')); ?></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('kilometers.store')); ?>" enctype="multipart/form-data" >
                        <?php echo e(csrf_field()); ?>

                        <input class="form-control1 text-center" type="text" name="supplier_id" id="supplier_id" value="<?php echo e(old('id')); ?>" hidden/>
                        <div id="identifikacijskiPodaciInputi" class="">
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicle-group-select"><?php echo e(trans('kilometers.group')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select name="vehicle-group-select" class="form-control1 vehicle-group-select" id="vehicle-group-select">
                                                    <option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
                                                    <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-10 col-sm-10 padding0">
                                                    <?php if($errors->has('vehicle-group-select')): ?>
                                                        <span class="help-block text-right">
                                                            <strong><?php echo e($errors->first('vehicle-group-select')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="subcategoiry-select"><?php echo e(trans('kilometers.subcategory')); ?></label>
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
                                            <div class="form-group">
                                                <div class="col-xs-10 col-sm-10 padding0">
                                                    <?php if($errors->has('subcategoiry-select')): ?>
                                                        <span class="help-block text-right">
                                                            <strong><?php echo e($errors->first('subcategoiry-select')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label class="control-label" for="supplier-city"><?php echo e(trans('kilometers.vehicle')); ?></label>
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
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            <?php if($errors->has('vl')): ?>
                                                <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('vl')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label for="date">Datum:</label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input type="date" class="form-control1" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            <?php if($errors->has('date')): ?>
                                                <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('date')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label for="kilometers">Kilometraža:</label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input type="number" class="form-control1" id="kilometers" name="kilometers" step="0.01">
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
      $('.nav-pills .nav-item').on('click', function() {
        // Ukloni class 'active' s trenutno aktivnog elementa
        $('.nav-pills .nav-item .nav-link.active').removeClass('active');
        // Ukloni class 'active2' s trenutno aktivnog elementa
        $('.nav-pills .nav-item.active2').removeClass('active2');
        
       
        $(this).addClass('active2');

        $(this).find('.nav-link').addClass('active');
      });
    });

    $('#identifikacijskiPodaci').on('click', function() {
        $('#identifikacijskiPodaciInputi').removeClass('d-none');

        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#odrzavanje').on('click', function() {
        $('#odrzavanjeInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#status').on('click', function() {
        $('#statusInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#zivotniVijek').on('click', function() {
        $('#zivotniVijekInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#nabava').on('click', function() {
        $('#nabavaInputi').removeClass('d-none'); 

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#tehnickiPodaci').on('click', function() {
        $('#tehnickiPodaciInputi').removeClass('d-none');

        $('#nabavaInputi').addClass('d-none'); 
        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        
    });

    
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


    $('#vl').on('change', function () {
    var vehicle_id = $('#vl').val();

    // Make an Axios request instead of using select2
    axios.post("<?php echo e(route('vehicles.details')); ?>", {
            id: vehicle_id, // Promenite payload da biste poslali samo ID
        })
        .then(function (response) {
            // Process the results and update UI as needed
            var data = response;
            $('#kilometers').val(data.kilometers);
        })
        .catch(function (error) {
            console.error(error);
        });
    });

</script>
  
<?php /**PATH C:\Projekti\Wine360\resources\views/kilometers/addModal.blade.php ENDPATH**/ ?>