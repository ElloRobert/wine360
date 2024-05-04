


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
							<div class="col-xs-12">
								<h2><?php echo e(trans('maintenance.title')); ?></h2>
							</div>
						</div>
						<div class="col-xs-3 padding0">
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="<?php echo e(asset('img/interface/filteri.svg')); ?>" class="">
							</button>
							<?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
								<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
									<?php if(Auth::user()->ownsAnyVehicle()): ?>
										<a style="margin-left: 6px;" id="add-vehicle" class="btn gumb" href="javascript:void(0)"><?php echo e(trans('maintenance.add')); ?> +</a>
									<?php endif; ?>
								<?php endif; ?>

								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
									<button type="button" class="btn gumb" id="openAddMaintenanceModal" >
										<?php echo e(trans('maintenance.add')); ?> +
									</button>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
							<div class="filter col-sm-3">
								<select id="company-select" name="company-select" class="form-control1">
									<option value="">Sve tvrtke</option>
									<?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($configuration->id); ?>"><?php echo e($configuration->applicationName); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						<?php endif; ?>
						<div class="filter col-sm-3 ">
							<select id="vehicle-group-select" name="vehicle-group-select" class="form-control1">
								<option value=""><?php echo e(trans('reminder.allVehicles')); ?></option>
								 <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="filter col-sm-3 ">
							<select id="subcategoiry-select" name="subcategoiry-select" class="form-control1">
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
						<div class="filter col-sm-3 ">
							<input style="display: none;" id="filter-vehicles-list2" class="form-control1" data-path=".vehicles-name" type="text" value="" placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>" data-control-type="textbox"data-control-name="title-filter" data-control-action="filter" />
							<select id="vehicles-list2" style="width: 100%" class="form-control1" name="vl" data-path=".vehicles-name"data-control-type="textbox" data-control-name="title-filter" data-control-action="filter">
								<option value="">Sva vozila</option>
								<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->name); ?> <?php echo e($vehicle->license_plate); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="row mb-3 filteri mt-5" style="margin-top: 15px">
					</div>
				</div>
				<div class="row table-vehicles">
					<div class="col-xs-12">
						<table id="maintenceTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Vozilo</th>
									<th>Naziv</th>
									<th>Pozicija</th>
									<th>Datum nastanka</th>
									<th>Prioritet</th>
									<th>Status</th>
									<th>Opcije</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif; ?>
			<?php if(Session::has('message')): ?>
					<div <?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?> style="margin-top: 20px;" <?php endif; ?> class="col-xs-12">
						<div class="alert alert-danger" role="alert">
							<?php echo e(Session::get('message')); ?>

						</div>
      			</div>
      		<?php endif; ?>
		</div>
		<div>
			<?php echo $__env->make('maintenance.editModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('maintenance.confirmModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({ html:true });

		$('#add-vehicle').click(function () {
			$('#vehicles-name').focus();
		});

		if ($(window).width() >= 768 && $(window).width() <= 1200) {
			$('#dashboard-content').css('height', $('#dashboard-content .content').height() + $('#dashboard-content .content .headline-title').height() * 2);
		} else {
			$('#dashboard-content').css('height', $('#dashboard-content .content').height() + $('#dashboard-content .content .headline-title').height() * 8);
		}

		$('.default-no-img-vehicle').css('height', $('#vehicles-add-new form .col-xs-12.col-sm-5').width() / 2);
		$('.default-no-img-vehicle label').css('height', $('#vehicles-add-new form .col-xs-12.col-sm-5').width() / 2);

		$(window).resize(function () {
			if ($(window).width() >= 768 && $(window).width() <= 1200) {
				$('#dashboard-content').css('height', $('#dashboard-content .content').height() + $('#dashboard-content .content .headline-title').height() * 2);
			} else {
				$('#dashboard-content').css('height', $('#dashboard-content .content').height() + $('#dashboard-content .content .headline-title').height() * 8);
			}

			$('.default-no-img-vehicle').css('height', $('#vehicles-add-new form .col-xs-12.col-sm-5').width() / 2);
			$('.default-no-img-vehicle label').css('height', $('#vehicles-add-new form .col-xs-12.col-sm-5').width() / 2);
		});

		$('.select2').select2();

		$('#vehicles-list').select2({
			cache: true,
			placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
					language: {
						"noResults": function() {
						return "<?php echo e(trans('vehicles.noResults')); ?>";
						}
					},
			ajax: {
				url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
				type: 'GET',
				dataType: 'json',
				data: function (params) {
				return { vl: params.term, u: $('#u').val() }
				},
				processResults: function (data) {
				return { results: data }
				}
			}
		});

		$('#vehicles-list').change(function () {
		if ($('#vehicles-list').val().length > 0) {
			$('#select-vehicle').attr('href', '<?php echo e(route("vehicles.index")); ?>/'+$('#vehicles-list').val());
		}
		});

		// Dodaj event listener na dugme
		$('#openAddMaintenanceModal').on('click', function() {
			// Otvaranje moda samo ako je pritisnuto dugme za Add Maintenance
			$('#addMaintenanceModal').modal('show');
		});

	});

	// HTML elementi
	let vehicleGroupSelect = document.querySelector('select[name="vehicleGroup"]');
	let subcategoryContainer = document.querySelector('#subcategoryContainer');

	// Funkcija za dohvaćanje subkategorija
	function fetchSubcategories(selectedGroupId) {
		// Slanje Axios zahtjeva na backend za subcategories
		axios.get('/configuration/subcategory/' + selectedGroupId)
			.then(function(response) {
				let subcategories = response.data.subcategory;
				// Kreiranje i postavljanje novog select elementa
				let subcategorySelect = document.createElement('select');
				subcategorySelect.name = 'subcategory';
				subcategorySelect.classList.add('form-control');
				subcategoryContainer.innerHTML = ''; // Očisti prethodni sadržaj
				subcategoryContainer.appendChild(subcategorySelect);
				subcategories.forEach(function(subcategory) {
					let option = document.createElement('option');
					option.value = subcategory.id;
					option.textContent = subcategory.name;
					subcategorySelect.appendChild(option);
				});
			})
			.catch(function(error) {
				console.error('Greška pri dohvaćanju podkategorija:', error);
			});
	}

	// Rukovanje promjenama u selektu
	vehicleGroupSelect.addEventListener('change', function() {
		let selectedGroupId = this.value;
		if (selectedGroupId) {
			fetchSubcategories(selectedGroupId);
		} else {
			subcategoryContainer.innerHTML = ''; // Ako nije odabrana vrijednost, ispraznite subcategoryContainer
		}
	});

	// Prilikom prvog učitavanja stranice, provjeri koja je kategorija odabrana
	let initialSelectedGroupId = vehicleGroupSelect.value;
	if (initialSelectedGroupId) {
		fetchSubcategories(initialSelectedGroupId);
	}
	// Osluškivanje promene u marki
	$('select[name="vehicles_mark"]').on('change', function() {
            var selectedBrand = $(this).val();

            // Ako nije odabrana marka, prazni modele i izlazi
            if (!selectedBrand) {
                $('select[name="vehicles_model"]').empty();
                return;
            }

            // Inače, učitaj modele te marke
			axios.get('ModelsByBrand/' + selectedBrand)
			.then(function(response) {
				// Popuni select sa modelima
				var modelsSelect = $('select[name="vehicles_model"]');
                    modelsSelect.empty();

                    // Dodaj praznu opciju
                    modelsSelect.append('<option value="">-</option>');
					console.log(response);
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

		
	function editVehicleMaintenance(vehicleMaintenanceId) {
		var maintenance_id = vehicleMaintenanceId;
		$('#editMaintenceModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('vehicles.maintenance.details')); ?>",
			data: { 
				id: maintenance_id,
				_token: "<?php echo e(csrf_token()); ?>",
			},
			success: function(data) {
				
				$('#malfunction-update-form').attr('action', '<?php echo e(route("vehicles.maintenance")); ?>/'+maintenance_id);
				$('#malfunction-delete-form').attr('action', '<?php echo e(route("vehicles.maintenance")); ?>/delete/'+maintenance_id);

				$('#malfunction-update-form #maintenanceDetailsName').val(data.name);

				$('#malfunction-update-form .vehicle-group-select').val(data.vehicles[0].vehicle_group_id);

				var selectedGroupId = data.vehicles[0].vehicle_group_id;
				
				var selectedSubcategoryId = data.vehicles[0].subcategory_id;

				var selectedVehicle =  data.vehicles[0].id;
					$.ajax({
						url: "<?php echo e(route('vehicles_list_by_group')); ?>",
						method: 'GET',
						data: { group_id: selectedGroupId },
						success: function (data) {
							var $vehiclesList2 = $('#vl2');
							var $subcategorySelect = $('.subcategoiry-select');

							// Clear and update the options in the #vehicles-list2 select.
							$vehiclesList2.empty();
							$.each(data.vehicles_list, function (index, vehicle) {
								var isSelected = vehicle.id == selectedVehicle;
								$vehiclesList2.append($('<option>', {
									value: vehicle.id,
									text: vehicle.text,
									selected: isSelected 
								}));
							});

							// Clear and update the options in the #subcategoiry-select select.
							$subcategorySelect.empty();
							$subcategorySelect.append($('<option>', {
								value: 0,
								text: 'Odaberite podkategoriju'
							}));

							$.each(data.subcategory, function (index, subcat) {
								// Check if subcat.id is equal to the captured selectedSubcategoryId
								var isSelected = subcat.id == selectedSubcategoryId;

								$subcategorySelect.append($('<option>', {
									value: subcat.id,
									text: subcat.name,
									selected: isSelected // Set selected attribute if it matches
								}));
							});
						},
						error: function (error) {
							console.error(error);
						}
					});
				
				var vehicles = data.vehicles;
				var selectedVehiclesIds = data.vehicles.map(vehicle => vehicle.id);
			
				document.querySelectorAll('#editMaintenceModal .vehiclesOption').forEach((option) => {
					var optionValue = option.value;
					var optionValue = parseInt(optionValue, 10);
					if (selectedVehiclesIds.includes(optionValue)) {
						option.setAttribute('selected', 'selected');
					}
				});

				$('#vl2').trigger('change.select2');

				function formatDate(dateString) {
					if (!dateString) {
						return null;
					}

					const date = new Date(dateString);
					const year = date.getFullYear();
					const month = String(date.getMonth() + 1).padStart(2, '0');
					const day = String(date.getDate()).padStart(2, '0');

					return `${year}-${month}-${day}`;
				}

				const formattedDateEnd = data.end_date_remainder;
				const formattedDate = formatDate(data.date);
				
				$('#malfunction-update-form #maintenanceDetailsDate').val(formattedDate);
				$('#malfunction-update-form #maintenanceDetailsEndDate').val(formattedDateEnd);
				$('#malfunction-update-form #maintenanceDetails').text(data.details);

				$('#malfunction-update-form #malfunction-image-position-modal option[value="'+data.vehicle_image_position+'"]').attr('selected', 'selected');

				$('#malfunction-update-form #maintenanceKilometersTraveled').val(data.kilometers_traveled);
				$('#malfunction-update-form #maintenancePriority').val(data.malfunction_priority);
				
				
			
				$('#malfunction-update-form #malfunctionCostNeto').val(data.neto_value);
				$('#malfunction-update-form #malfunctionCostVAT').val(data.VAT);
				$('#malfunction-update-form #malfunctionCostBruto').val(data.bruto_value);
				if(data.end_date_remainder != null){
					$('#malfunction-update-form #maintenance_create_reminderEdit').val(1);
					$('#malfunction-update-form #recurring_reminderEdit').removeClass('d-none');
				}
				
				

			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function deleteVehicleMaintenance(vehicleMaintenanceId) {
		var maintenance_id = vehicleMaintenanceId;
		var malfunction_name = $('#maintenanceDetailsName').val();
		$('#confirm .modal-body .remove-malfunction-name').text(malfunction_name);
		$('#malfunction-delete-form').attr('action', '<?php echo e(route("vehicles.maintenance")); ?>/delete/'+maintenance_id);
		$('#confirm').modal({ backdrop: 'static', keyboard: false });
	
	}
	
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
    });

	$(function() {
		let grupaFilter = '';
		let subcategoryFilter = '';
		let voziloFilter = '';
		// Event listener for the filter inputs
		$('#vehicle-group-select, #subcategoiry-select, #vehicles-list2').on('change', function() {
			grupaFilter = $('#vehicle-group-select').val();
			subcategoryFilter = $('#subcategoiry-select').val();
			voziloFilter = $('#vehicles-list2').val();
			$('#maintenceTable').DataTable().ajax.reload();
		});

		$('#maintenceTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '<?php echo e(route('getMaintenanceData')); ?>',
				type: 'GET',
				data: function (d) {
					d.grupaFilter = grupaFilter;
					d.subcategoryFilter = subcategoryFilter;
					d.voziloFilter = voziloFilter;
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
						{ data: '1', name: 'name' },
						{ data: '2', name: 'vehicle_image_position' },
						{ data: '3', name: 'date' },
						{ data: '4', name: 'malfunction_priority' },
						{ data: '5', name: 'status' },
						{ data: '6', name: 'Opcije' },
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
                sInfoEmpty:    'Prikazuje se 0 do 0 od ukupno 0 unosa',// Postavite željeni tekst za prikaz broja unosa
			}
		});
	});

	function changeStatus(id) {
		$.ajax({
			type: 'GET',
			url: "<?php echo e(route('getMaintenance')); ?>",
			data: {
				_token: "<?php echo e(csrf_token()); ?>",
				id: id,
			},
			success: function(response){
				// Proverite da li postoji greška u odgovoru
				if (response.error) {
					console.error(response.error);
					return;
				}

				$('#maintenceTable').DataTable().ajax.reload();
			},
			error: function(xhr, status, error) {
				console.error("AJAX request error:", status, error);
			}
		});
	}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/maintenance/index.blade.php ENDPATH**/ ?>