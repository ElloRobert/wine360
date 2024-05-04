


<?php $__env->startSection('body_class', 'body__interface'); ?>


<?php $__env->startSection('dashboard-content'); ?>
<style>
	.table-vehicles{
		margin-top: 50px;
	}


</style>

<div class="home-dashboard-content">
	<div class="row vehicles-home text-left mt-15">
		<!-- Left side - img -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-5 padding0 naslov">
							<h1><?php echo e(trans('fuel.title')); ?></h1>
						</div>
						<div class="col-xs-3 padding0" >
							
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri" >
								<img src="<?php echo e(asset('img/interface/filteri.svg')); ?>" class="">
							</button>
							<?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
								<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
									<?php if(Auth::user()->ownsAnyVehicle()): ?>
										<a style="margin-left: 6px;" id="add-vehicle" class="default-button gumb" href="javascript:void(0)"><?php echo e(trans('fuel.add')); ?></a>
									<?php endif; ?>
								<?php endif; ?>
								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
									<button type="button" class="btn gumb" data-toggle="modal" data-target="#addFuelModal" >
										<?php echo e(trans('fuel.add')); ?> +
									</button>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
							<div class=" col-md-3">
								<select id="company-select" name="company-select" class="form-control1">
									<option value="">Sve tvrtke</option>
									<?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($configuration->id); ?>"><?php echo e($configuration->applicationName); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						<?php endif; ?>
						<div class="col-md-3">
							<select id="vehicle-group-select" name="vehicle-group-select" class="form-control1">
								<option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
								 <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="subcategoiry-select" name="subcategoiry-select" class="form-control1" style="background-color: #F8F8FA">
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
						<div class="col-md-3">
							<input style="display: none;" id="filter-vehicles-list2" class="form-control" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
							<select id="vehicles-list2" style="width: 100%" class="form-control1" name="vl" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter">
								<option value="">Sva vozila</option>
								<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> <?php echo e($vehicle->license_plate); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="supplierFilter" class=" form-control1 ">
								<option value="">Dobavljač</option>
								<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="row mb-3 filteri mt-5" style="margin-top: 15px">
						
					
					</div>
				</div>
				<?php if(Session::has('message')): ?>
					<div <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?> style="margin-top: 20px;" <?php endif; ?> class="col-xs-12">
						<div class="alert alert-danger" role="alert">
							<?php echo e(Session::get('message')); ?>

						</div>
					</div>
		  		<?php endif; ?>
				<div class="row table-vehicles">
					<div class="col-xs-12">
						<table id="vehiclesTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Naziv</th>
									<th>Grupa</th>
									<th>Podgrupa</th>
									<th>Količina</th>
									<th>Neto jedinični trošak</th>
									<th>Ukupni trošak</th>
									<th>Dobavljač</th>
									<th>Opcije</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif; ?>
		
		</div>
	
		<?php echo $__env->make('fuel.confirmModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

	$('#vehicle-group-select').on('change', function () {
			var selectedGroupId = $(this).val();
			// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
			$.ajax({
				url: "<?php echo e(route('vehicles_list_by_group')); ?>",
				method: 'GET',
				data: { group_id: selectedGroupId },
				success: function (data, selectedGroupId) {
					var $vehiclesList2 = $('#vehicles-list2');
					var $subcategorySelect = $('#subcategoiry-select');

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
					
					selectedGroupId = $('#vehicle-group-select').val();
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

	$('#subcategoiry-select').on('change', function () {
		var group_id = $('#vehicle-group-select').val();
		var subcategory_id = $(this).val();

		// Clear previous options in the #vehicles-list2 select
		$('#vehicles-list2').empty();

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
			console.log(response.data);

			// Assuming you have an element to display the results, update it accordingly
			// For example, if you have a div with id 'results-container'
			var resultsContainer = $('#results-container');
			resultsContainer.empty();
			$('#vehicles-list2').prepend($('<option>', {
				value: '', 
				text: 'Sva vozila' 
			}));
			$.each(data, function (index, vehicle) {
				// Append new options to the #vehicles-list2 select
				$('#vehicles-list2').append($('<option>', {
					value: vehicle.id,
					text: vehicle.text 
				}));
			});
		})
		.catch(function (error) {
			console.error(error);
		});
	});


	function editFuel(fuelId) {
		var fuelId = fuelId;
		$('#addFuelModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('vehicles.fuel.get')); ?>", 
			data: { 
				id: fuelId,
				_token: "<?php echo e(csrf_token()); ?>",
			},
			success: function(data) {
				$('#fuel_id').val(data.fuel.id);
				$('.vehicle-group-select').val(data.vehicle.vehicle_group_id);

				var selectedGroupId = data.vehicle.vehicle_group_id;
				var subcategoryId = data.vehicle.subcategory_id;
				var vehicleId = data.fuel.vehicle_id;
				// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
				$.ajax({
					url: "<?php echo e(route('vehicles_list_by_group')); ?>",
					method: 'GET',
					data: { group_id: selectedGroupId, subcategoryId,vehicleId },
					success: function (data, selectedGroupId) {
						var $vehiclesList2 = $('.vehicles-list2');
						var $subcategorySelect = $('.subcategoiry-select');
						// Clear and update the options in the #vehicles-list2 select.
						$vehiclesList2.empty();
						$.each(data.vehicles_list, function (index, vehicle) {
							var option = $('<option>', {
								value: vehicle.id,
								text: vehicle.text
							});

							// Postavi 'selected' atribut ako je value jednak vehicleId
							if (vehicle.id == vehicleId) {
								option.prop('selected', true);
							}

							$vehiclesList2.append(option);
						});

						// Clear and update the options in the #subcategoiry-select select.
						$subcategorySelect.empty();
						$subcategorySelect.append($('<option>', {
							value: 0,
							text: 'Odaberite podkategoriju'
						}));
						
					// Postavljanje odabrane opcije unutar petlje
						$.each(data.subcategory, function (index, subcat) {
							var option = $('<option>', {
								value: subcat.id,
								text: subcat.name,
								selected: (subcat.id == subcategoryId)
							});

							$subcategorySelect.append(option);
						});

						// Nakon dodavanja svih opcija, postavite odabranu vrijednost
						$subcategorySelect.val(subcategoryId);
						
						selectedGroupId = $('.vehicle-group-select').val();
						if(selectedGroupId == 0){
							
						}else{
							// $vehiclesList2.trigger('change');
							$subcategorySelect.trigger('change');
						}
					},
					error: function (error) {
						console.error(error);
					}
				});
				$('.subcategoiry-select').val(data.vehicle.subcategory_id);
				$('#vehicle_id').val(data.fuel.vehicle_id);
				$('#liters').val(data.fuel.liters);
				$('#fuel_neto_cost').val(data.fuel.fuel_neto_cost);
				$('#fuel_vat').val(data.fuel.fuel_vat);
				$('#fuel_total_cost').val(data.fuel.fuel_total_cost);
				$('#fuel_place').val(data.fuel.fuel_place);
				$('#fuel_supplier').val(data.fuel.fuel_supplier);
				$('.select2').select2();

			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function deleteFuel(fuelId) {
		var fuelId = fuelId;
		$('#confirmModal').modal('show');
		$('#malfunction-delete-form').attr('action', '/fuel/delete/' + fuelId);
		$('#confirm').modal({ backdrop: 'static', keyboard: false });
	
	}

	$('#grupaVozilaFilter').on('change', function () {
    	var selectedGroupId = $(this).val();
    	// Make an AJAX request to get the filtered vehicle list and subcategory based on the selected group.
		$.ajax({
			url: "<?php echo e(route('vehicles_list_by_group')); ?>",
			method: 'GET',
			data: { group_id: selectedGroupId },
			success: function (data, selectedGroupId) {
				var $vehiclesList2 = $('#vehicles-list2');
				var $subcategorySelect = $('#podkategorijaFilter');

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
				
				selectedGroupId = $('#grupaVozilaFilter').val();
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

	$('#markaFilter').on('change', function() {
            var selectedBrand = $(this).val();
			console.log(this);
            // Ako nije odabrana marka, prazni modele i izlazi
            if (!selectedBrand) {
                $('select[name="modelFilter"]').empty();
                return;
            }

            // Inače, učitaj modele te marke
			axios.get('ModelsByBrand/' + selectedBrand)
			.then(function(response) {
				// Popuni select sa modelima
				var modelsSelect = $('select[name="modelFilter"]');
                    modelsSelect.empty();

                    // Dodaj praznu opciju
                    modelsSelect.append('<option value="">-</option>');
                    // Dodaj opcije sa modelima
                    $.each(response.data.models, function(key, value) {
                        modelsSelect.append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                    // Osveži Select2
                    modelsSelect.select2();
			})
			.catch(function(error) {
				console.error('Greška pri dohvaćanju podkategorija:', error);
			});
	});

	$(function() {
        let grupaVozilaFilter = '';
        let podkategorijaFilter = '';
        let voziloFilter = '';
        let supplierFilter = '';
	

          //Event listener for the filter inputs
          $('#vehicle-group-select, #subcategoiry-select, #vehicles-list2, #supplierFilter').on('change', function() {
            grupaVozilaFilter = $('#vehicle-group-select').val();
            podkategorijaFilter = $('#subcategoiry-select').val();
            voziloFilter = $('#vehicles-list2').val();
            supplierFilter = $('#supplierFilter').val();
            $('#vehiclesTable').DataTable().ajax.reload();
        });

        $('#vehiclesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '<?php echo e(route('getFuelData')); ?>',
                    type: 'GET',
                    data: function (d) {
                        d.grupaVozilaFilter = grupaVozilaFilter;
                        d.podkategorijaFilter = podkategorijaFilter;
                        d.voziloFilter = voziloFilter;
                        d.supplierFilter = supplierFilter;
                    },
                    deferRender: true, // Enable deferred rendering
                    dataSrc: function (json) {
                        json.recordsTotal = json.recordsTotal; // Add recordsTotal property
                        json.recordsFiltered = json.recordsFiltered; // Add recordsFiltered property
                        return json.data; // Return the data array
                    }
                },
				columns: [
						{ data: '0', name: 'vehicle_name' },
						{ data: '1', name: 'group_name' },
						{ data: '2', name: 'subcategory_name' },
						{ data: '3', name: 'liters' },
						{ data: '4', name: 'fuel_neto_cost' },
						{ data: '5', name: 'fuel_total_cost' },
						{ data: '6', name: 'suppliers_name' },
						{ data: '7', name: 'Opcije' },
			],
			language: {
					search: 'Pretraga:',
					lengthMenu: 'Prikaži _MENU_ unosa',
					oPaginate: {
                        sFirst:    'Prva',
                        sPrevious: 'Prethodna',
                        sNext:     'Sljedeća',
                        sLast:     'Posljednja'
                    },
					sInfo:         'Prikazuje se _START_ do _END_ od ukupno _TOTAL_ unosa',
                    sInfoEmpty:    'Prikazuje se 0 do 0 od ukupno 0 unosa',
				}
        });
    });


	$('#showFilteri').on('click', function() {
      	// Provjeri trenutno stanje stila display
	  	var filteriElement = $('#filteri');

		// Provjeri je li #filteri ima klasu d-none
		if (filteriElement.hasClass('d-none')) {
			// Ako ima, ukloni tu klasu
			filteriElement.removeClass('d-none');
		} else {
			// Ako nema, dodaj tu klasu
			filteriElement.addClass('d-none');
		}
    })
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/fuel/index.blade.php ENDPATH**/ ?>