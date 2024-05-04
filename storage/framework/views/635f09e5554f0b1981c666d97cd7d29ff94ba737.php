

<div class="modal fade" id="addCostModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('costs.add')); ?></h2>
            </div>
            
            <div class="modal-body">
               
                <div class="card text-center">
                    <div class="card-header mt-15">
                            <ul class="nav nav-pills card-header-pills">
                              <li class="nav-item col liPoravnanje active2" style="width: 33%" id="noviTrosakItem">
                                <a class="nav-link active noviTrosak" href="#" id="noviTrosak">Novi trošak</a>
                              </li>
                              <li class="nav-item col liPoravnanje" style="width: 33%" id="ucestalostTroskaItem">
                                <a class="nav-link ucestalostTroska" href="#" id="ucestalostTroska">Učestalost troška</a>
                              </li>
                              <li class="nav-item col liPoravnanje" style="width: 33%" id="dokumentacijaItem">
                                <a class="nav-link dokumentacija" href="#" id="dokumentacija">Dokumentacija</a>
                              </li>
                            </ul>
                    </div>
                    <div class="card-body mt-15">
                      
                    </div>
                  </div>
                    <div class="row">
                        <form method="POST" action="<?php echo e(route('costs.store')); ?>" enctype="multipart/form-data" >
                            <?php echo e(csrf_field()); ?>

                            <input class="form-control1 text-center" type="text" name="cost_id" id="cost_id" value="<?php echo e(old('cost_id')); ?>" hidden/>
                            <div id="identifikacijskiPodaciInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="vehicle-group-select"><?php echo e(trans('kilometers.group')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <select name="vehicle-group-select" class="form-control1 vehicle-group-select-cost">
                                                        <option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
                                                        <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="supplier-city"><?php echo e(trans('kilometers.subcategory')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <select name="subcategoiry-select" class="form-control1 subcategoiry-select-cost">
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
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="supplier-city"><?php echo e(trans('kilometers.vehicle')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select style="width: 100%" name="vl[]" id="vl" class="form-control1 vehicles-list2 select2" data-path=".vehicles-name" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" multiple>
                                                    <?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> (<?php echo e($vehicle->license_plate); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('supplier_name')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('supplier_name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label for="cost_type_id">Vrsta troška:</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 select2" name="cost_type_id" id="cost_type_id">
                                                    <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                    <?php $__currentLoopData = $cost_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value=<?php echo e($cost_type->id); ?>><?php echo e($cost_type->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label for="amount">Iznos:</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input type="number" class="form-control1" id="amount" name="amount" step="0.01">
                                            </div>
                                        </div>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label for="date">Datum:</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 date" type="text" name="date" id="date" value="<?php echo e(old('date')); ?>" placeholder="dd/mm/yyyy"/>
                                            </div>
                                        </div>
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label for="supplier_id">Dobavljač:</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 select2" name="supplier_id" id="supplier_id">
                                                    <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value=<?php echo e($supplier->id); ?>><?php echo e($supplier->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
                                    <div class="form-group row mt-15">
                                        <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                                            <a class="btn gumb mt-15 ucestalostTroska" href="#" ><?php echo e(trans('costs.next')); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div id="odrzavanjeInputi" class="d-none">
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-12 col-sm-12">
                                            <label for="cost_frequency">Učestalost troška:</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12"> 
                                            <select class="form-control1 select2" name="cost_frequency " id="cost_frequency">
                                                <option value="1">Jednokratni trošak</option>
                                                <option value="2">Ponavljajući trošak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 padding0 jednokratni">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="control-label" for="dateOfCost"><?php echo e(trans('costs.dateOfCost')); ?></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <input class="form-control1 date" type="text" name="dateOfCost" id="dateOfCost" value="<?php echo e(old('warranty_expiry_date')); ?>" placeholder="dd/mm/yyyy"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="ponavljajuci d-none">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="control-label" for="startDate"><?php echo e(trans('costs.startDate')); ?></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <input class="form-control1 date" type="text" name="startDate" id="startDate" value="<?php echo e(old('startDate')); ?>" placeholder="dd/mm/yyyy"/>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="row">
                                            <div class="marginTop">
                                                <div class="col-xs-12 col-sm-12">
                                                    <label class="control-label" for="endDate"><?php echo e(trans('costs.endDate')); ?></label>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                    <input class="form-control1 date" type="text" name="endDate" id="endDate" value="<?php echo e(old('endDate')); ?>" placeholder="dd/mm/yyyy"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-12 col-sm-12" style="margin-top:20px">
                                                <label lass="control-label" for="recurring_reminder_id"><?php echo e(trans('costs.recurring_cost')); ?></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <select class="form-control1" name="recurring_reminder_id" id="recurring_reminder_id">
                                                    <option value="0" selected>Ne</option>
                                                    <?php $__currentLoopData = $recurring_reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recurring_reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($recurring_reminder->id); ?>"><?php echo e(trans($recurring_reminder->name)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-12 col-sm-12">
                                            <label class="control-label" for="note"><?php echo e(trans('costs.note')); ?></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            <textarea class="form-control1" name="note" id="note" rows="4" placeholder="<?php echo e(trans('costs.enterNoteHere')); ?>"><?php echo e(old('note')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
                                    <div class="form-group row mt-15">
                                        <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                                            <a class="btn gumb mt-15 dokumentacija" href="#" ><?php echo e(trans('costs.next')); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div id="statusInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="control-label" for="attachment"><?php echo e(trans('costs.uploadAttachment')); ?></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <input class="form-control1" type="file" name="attachment" id="attachment" accept="image/*, .pdf, .doc, .docx" />
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
                            </div>
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

    $('.noviTrosak').on('click', function() {
        $('#identifikacijskiPodaciInputi').removeClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('.ucestalostTroska').on('click', function() {
        $('#odrzavanjeInputi').removeClass('d-none');
        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');

        $('#ucestalostTroska').addClass('active');
        $('#noviTrosak').removeClass('active');
        $('#dokumentacija').removeClass('active');

        $('#ucestalostTroskaItem').addClass('active2');
        $('#noviTrosakItem').removeClass('active2');
        $('#dokumentacijaItem').removeClass('active2');
    });

    $('.dokumentacija').on('click', function() {
        $('#statusInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');

        $('#dokumentacija').addClass('active');
        $('#ucestalostTroska').removeClass('active');
        $('#noviTrosak').removeClass('active');

        $('#ucestalostTroskaItem').removeClass('active2');
        $('#noviTrosakItem').removeClass('active2');
        $('#dokumentacijaItem').addClass('active2');
    });

    $('#cost_frequency').change(function() {
        // Dobavi odabrano vrijednost
        var selectedValue = $(this).val();

        // Provjeri je li odabrana vrijednost 1 (Jednokratni)
        if (selectedValue == 1) {
            $('.jednokratni').removeClass('d-none');
            $('.ponavljajuci').addClass('d-none');
        } else if (selectedValue == 2) {
            $('.jednokratni').addClass('d-none');
            $('.ponavljajuci').removeClass('d-none');
        } else {
            // Ako nije odabrana vrijednost 1, obrni postavke klasa
            $('.jednokratni').addClass('d-none');
            $('.ponavljajuci').addClass('d-none');
        }
    });

    // $('.date').datepicker({
    //     dateFormat: 'dd/mm/yy', // Postavi željeni format datuma
    //     changeMonth: true,
    //     changeYear: true
    // });

    $('.vehicle-group-select-cost').on('change', function () {
    	var selectedGroupId = $(this).val();
    	// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
		$.ajax({
			url: "<?php echo e(route('vehicles_list_by_group')); ?>",
			method: 'GET',
			data: { group_id: selectedGroupId },
			success: function (data, selectedGroupId) {
				var $vehiclesList2 = $('.vehicles-list2');
				var $subcategorySelect = $('.subcategoiry-select-cost');

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
				
				selectedGroupId = $('.vehicle-group-select-cost').val();
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

	$('.subcategoiry-select-cost').on('change', function () {
		var group_id = $('.vehicle-group-select-cost').val();
		var subcategory_id = $(this).val();

		$('.vehicles-list2').empty();
		
		axios.get("<?php echo e(route('autocomplete.vehicles_list')); ?>", {
			params: {
				vl: '',
				u: $('#u').val(),
				group_id: group_id,
				subcategory_id: subcategory_id
			}
		})
		.then(function (response) {
			var data = response.data;
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
  
<?php /**PATH C:\Projekti\wine360\resources\views/costs/addModal.blade.php ENDPATH**/ ?>