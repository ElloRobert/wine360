


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
							<h1><?php echo e(trans('vehicles.title')); ?></h1>
						</div>	
						<div class="col-xs-3 padding0" >
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="<?php echo e(asset('img/interface/filteri.svg')); ?>" class="">
							</button>
							<?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal')): ?>
								<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
									<?php if(Auth::user()->ownsAnyVehicle()): ?>
										<a style="margin-left: 6px;" id="add-vehicle" class="default-button gumb" href="javascript:void(0)"><?php echo e(trans('vehicles.addVehicle')); ?></a>
									<?php endif; ?>
								<?php endif; ?>

								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
									<button type="button" class="btn gumb" data-toggle="modal" data-target="#addVehicleModal" >
										<?php echo e(trans('vehicles.addVehicle')); ?> +
									</button>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						<div class="col-md-3">
							<select id="statusFilter" class="form-control1 select2">
								<option value="">Status</option>
								<?php $__currentLoopData = $VehicleStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VehicleStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($VehicleStatus->id); ?>"><?php echo e($VehicleStatus->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="categoryFilter" class="form-control1 select2">
								<option value="">Kategorija</option>
								<?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($vehicle_category->id); ?>"><?php echo e($vehicle_category->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							</select>
						</div>
						<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
							<div class="col-md-3">
								<select id="company-select" name="company-select" class="form-control1">
									<option value="">Sve tvrtke</option>
									<?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($configuration->id); ?>"><?php echo e($configuration->applicationName); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						<?php endif; ?>
						<div class="col-md-3">
							<select id="grupaVozilaFilter" class="form-control select2">
								<option value="">Grupa vozila</option>
								<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						
						
					</div>
					<div class="row mb-3 filteri mt-5" style="margin-top: 15px">
						<div class="col-md-3">
							<select id="podkategorijaFilter" class="form-control select2">
								<option value="">Podkategorija</option>
							</select>
						</div>
						<div class="col-md-3">
							<select id="propertyFilter" class=" form-control select2">
								<option value="">Vlasništvo</option>
								<?php $__currentLoopData = $VehicleProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VehicleProperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($VehicleProperty->id); ?>"><?php echo e($VehicleProperty->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="markaFilter" name="markaFilter" class="form-control select2">
								<option value="">Marka</option>
								<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($brand->id); ?>"><?php echo e($brand->title); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="modelFilter" name="modelFilter" class="form-control select2">
								<option value="">Model</option>
							</select>
						</div>
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
									<th>Marka</th>
									<th>Model</th>
									<th>Status</th>
									<th>Kategorija</th>
									<th>Grupa</th>
									<th>Podgrupa</th>
									<th>Vlasništvo</th>
									<th>Godina</th>
									<th>Registracija</th>
									<th>Vozač</th>
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
		<?php echo $__env->make('vehicles.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php if(!Auth::user()->hasRole('employee')): ?>
			<?php echo $__env->make('vehicles.cropImageModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('vehicles.confirmModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>
	</div>
</div>

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

    $('form .activity-div label').click(function () {
      $('form .activity-div label').removeClass('checkedRadio');
      $(this).addClass('checkedRadio');
    });
    
    $('#add-vehicle').click(function(){
      $(this).hide();
      $('#vehicles-add-new').removeClass('right');
      $('#vehicles-details').addClass('right');
    });

    // Show image on select
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.default-no-img-vehicle').css('background-image', 'url("' + e.target.result + '")');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#vehicle-image").change(function(){
      readURL(this);
    });
    
  //Insert new malfunction crop popup
	$('.popup-crop-modal').on('click', function (e) {
		e.preventDefault();
		$('#crop-modal').modal({ backdrop: 'static', keyboard: false });
	});

	$('#crop-modal .image-editor').cropit({
		smallImage: 'allow'
	});

	$('#crop-modal .rotate-cw').click(function () {
		$('#crop-modal .image-editor').cropit('rotateCW');
	});
	$('#crop-modal .rotate-ccw').click(function () {
		$('#crop-modal .image-editor').cropit('rotateCCW');
	});

	$('#vehicle-image').on('change', function () {
		$('.setting-tools').show();
	});

	$('#crop-modal .save').click(function () {
		var imageData = $('#crop-modal .image-editor').cropit('export');
		$('#vehicles-add-new .default-no-img-vehicle').css('background-image', 'url('+imageData+')');
		$('#vehicle-image-edited').val(imageData);
	});

	$('#malfunction-details-model-insert').on('hidden.bs.modal', function(){
		$('#malfunction-details-model-insert #malfunctionDetailsName').val('');
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear();
		if(dd<10)
		    dd='0'+dd;

		if(mm<10)
		    mm='0'+mm;

		today = dd+'.'+mm+'.'+yyyy;
		$('#malfunction-details-model-insert #malfunctionDetailsDate').val(today);
		$('#malfunction-details-model-insert #malfunctionDetailsEndDate').val('');
		$('#malfunction-details-model-insert #malfunctionDetails').val('');
		$('#malfunction-details-model-insert #malfunction-cost').val('');
		$('#malfunction-create-reminder').prop('checked', false);
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
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



</script>
<script>


	function editVehicle(vehicleId) {
		var vehicle_id = vehicleId;
		$('#addVehicleModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('vehicles.details')); ?>", 
			data: { 
				id: vehicle_id,
				_token: "<?php echo e(csrf_token()); ?>",
			},
			success: function(data) {
				
				$('#vehicle_id').val(data.id)
				$('#vehicles_chassis_number').val(data.chassis_number);
				$('#vehicles_name').val(data.name);
				$('#vehicles_category').val(data.vehicle_category_id);
				$('#vehicles_license_plate').val(data.license_plate);
				$('#vehicles_year').val(data.year);
				$('#vehicles_mark').val(data.mark);
				$('#vehicle_model').val(data.model);

				var selectedBrand = data.mark;

				// Ako nije odabrana marka, prazni modele i izlazi
				if (!selectedBrand) {
					$('select[name="vehicles_model"]').empty();
					return;
				}
				var model = data.model;
				var model = parseInt(model, 10);

				// Inače, učitaj modele te marke
				axios.get('ModelsByBrand/' + selectedBrand)
					.then(function(response) {
						// Popuni select sa modelima
						var modelsSelect = $('select[name="vehicles_model"]');
						modelsSelect.empty();

						// Dodaj praznu opciju
						modelsSelect.append('<option value="">-</option>');

						// Dodaj opcije sa modelima
						$.each(response.data.models, function(key, value) {
							var option = $('<option value="' + value.id + '">' + value.title + '</option>');
							console.log(value.id == model);	
							// Postavi opciju kao selektovanu ako je value.id jednak modelu
							if (value.id === model) {
								option.attr('selected', 'selected');
							}

							modelsSelect.append(option);
						});

						// Osveži Select2
						modelsSelect.select2();
					})
					.catch(function(error) {
						console.error('Greška pri dohvaćanju podkategorija:', error);
    				});

				
				$('#vehicles_status').val(data.vehicle_status_id);
				$('#vehicles_property').val(data.vehicle_property_id);
				$('#vehicleGroup').val(data.vehicle_group_id);
				$('#subcategoryContainer').val(data.subcategory_id);
				$('#start_date').val(data.date_start);
				$('#km_start').val(data.km_start);
				$('#date_start').val(data.date_start);
				$('#life_expectancy').val(data.life_expectancy);
				$('#km_expectancy').val(data.km_expectancy);
				$('#value_expectancy').val(data.value_expectancy);
				$('#end_date').val(data.end_date);
				$('#end_km_status').val(data.end_km_status);
				$('#supplier_id').val(data.supplier_id);
				$('#purchase_date').val(data.purchase_date);
				$('#mileage_at_purchase').val(data.mileage_at_purchase);
				$('#warranty_expiry_date').val(data.warranty_expiry_date);
				$('#max_mileage_warranty').val(data.max_mileage_warranty);
				$('#vehicleProcurement').val(data.procurement_type_id);
				$('#purchase_price_eur').val(data.purchase_price_eur);
				$('#number_of_people').val(data.number_of_people);
				$('#length').val(data.length);
				$('#height').val(data.height);
				$('#width').val(data.width);
				$('#trunk_capacity').val(data.trunk_capacity);
				$('#cargo_space').val(data.cargo_space);
				$('#payload_capacity').val(data.payload_capacity);
				$('#vehicles_fuel_type').val(data.fuel_type);
				$('#oil_class').val(data.oil_class);
				$('#fuel_tank_capacity').val(data.fuel_tank_capacity);
				$('#oil_tank_capacity').val(data.oil_tank_capacity);
				$('#drive_type').val(data.drive_type_id);
				$('#wheelbase').val(data.wheelbase);
				$('#transmission_type').val(data.transmission_type_id);
				$('#front_tire_dimensions').val(data.front_tire_dimensions);
				$('#front_tire_type').val(data.front_tire_type);
				$('#front_tire_pressure').val(data.front_tire_pressure);
				$('#rear_tire_dimensions').val(data.rear_tire_dimensions);
				$('#rear_tire_type').val(data.rear_tire_type);
				$('#rear_tire_pressure').val(data.rear_tire_pressure);

				$('.select2').select2();

			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function deleteVehicle(vehicleId) {
		var vehicleId = vehicleId;
		$('#confirmModal').modal('show');
		console.log(vehicleId);
		var malfunction_name = $('#malfunctionDetailsName').val();
		$('#confirm .modal-body .remove-malfunction-name').text(malfunction_name);
		$('#malfunction-delete-form').attr('action', '/vehicles/' + vehicleId);
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
        let statusFilter = '';
        let grupaVozilaFilter = '';
        let podkategorijaFilter = '';
        let categoryFilter = '';
        let markaFilter = '';
		let modelFilter = '';
        let propertyFilter = '';

          // Event listener for the filter inputs
          $('#statusFilter, #grupaVozilaFilter, #podkategorijaFilter, #categoryFilter, #markaFilter, #modelFilter, #propertyFilter').on('change', function() {
            statusFilter = $('#statusFilter').val();
            grupaVozilaFilter = $('#grupaVozilaFilter').val();
            podkategorijaFilter = $('#podkategorijaFilter').val();
            categoryFilter = $('#categoryFilter').val();
            markaFilter = $('#markaFilter').val();
			modelFilter = $('#modelFilter').val();
			propertyFilter = $('#propertyFilter').val();
            $('#vehiclesTable').DataTable().ajax.reload();
        });

        $('#vehiclesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '<?php echo e(route('getVehiclesData')); ?>',
                    type: 'GET',
                    data: function (d) {
                        d.statusFilter = statusFilter;
                        d.grupaVozilaFilter = grupaVozilaFilter;
                        d.podkategorijaFilter = podkategorijaFilter;
                        d.categoryFilter = categoryFilter;
                        d.markaFilter = markaFilter;
						d.modelFilter = modelFilter;
						d.propertyFilter = propertyFilter;
                    },
                    deferRender: true, // Enable deferred rendering
                    dataSrc: function (json) {
                        json.recordsTotal = json.recordsTotal; // Add recordsTotal property
                        json.recordsFiltered = json.recordsFiltered; // Add recordsFiltered property
                        return json.data; // Return the data array
                    }
                },
				columns: [
						{ data: '0', name: 'name' },
						{ data: '1', name: 'mark' },
						{ data: '2', name: 'model' },
						{ data: '3', name: 'vehicle_status_id' },
						{ data: '4', name: 'vehicle_category_id' },
						{ data: '5', name: 'vehicle_group_id' },
						{ data: '6', name: 'subcategory_id' },
						{ data: '7', name: 'vehicle_property_id' },
						{ data: '8', name: 'year' },
						{ data: '9', name: 'license_plate' },
						{ data: '10', name: 'driver_name' },
						{ data: '11', name: 'Opcije' },
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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/vehicles/index.blade.php ENDPATH**/ ?>