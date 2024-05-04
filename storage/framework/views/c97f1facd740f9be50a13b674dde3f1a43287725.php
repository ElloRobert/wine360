


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
							<h1><?php echo e(trans('kilometers.title')); ?></h1>
						</div>
						<div class="col-xs-3 padding0" >
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="<?php echo e(asset('img/interface/filteri.svg')); ?>" class="">
							</button>
							<?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
								<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
									<button type="button" class="btn gumb" data-toggle="modal" data-target="#addVehicleModal" >
										<?php echo e(trans('kilometers.add')); ?> +
									</button>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						<div class="col-md-3">
							<select id="statusFilter" class="form-control1 select2 w-auto">
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
							<div class="col-sm-3">
								<select id="company-select" name="company-select" class="form-control1">
									<option value="">Sve tvrtke</option>
									<?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($configuration->id); ?>"><?php echo e($configuration->applicationName); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						<?php endif; ?>
						<div class="col-md-3">
							<select id="grupaVozilaFilter" class="form-control1 select2">
								<option value="">Grupa vozila</option>
								<?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="row mb-3 filteri mt-5" style="margin-top: 15px">
						<div class="col-md-3">
							<select id="podkategorijaFilter" class="form-control1 select2">
								<option value="">Podkategorija</option>
							</select>
						</div>
						<div class="col-md-3">
							<select id="markaFilter" name="markaFilter" class="form-control1 select2">
								<option value="">Marka</option>
								<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($brand->id); ?>"><?php echo e($brand->title); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-md-3">
							<select id="modelFilter" name="modelFilter" class="form-control1 select2">
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
						<table id="suppliersTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Naziv</th>
									<th>Marka</th>
									<th>Model</th>
									<th>Status</th>
									<th>Registracijska oznaka</th>
									<th>Datum unosa</th>
									<th>Stanje kilometara</th>
									<th>Ugovorena kilometraža</th>
									<th>Vozač</th>
									<th>Kontakt vozača</th>
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

			<?php echo $__env->make('kilometers.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('kilometers.confirmModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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


	function editKilometer(kilometerId) {
		var kilometerId = kilometerId;
		$('#addVehicleModal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo e(route('kilometers.details')); ?>", 
			data: { 
				id: kilometerId,
				_token: "<?php echo e(csrf_token()); ?>",
			},
			success: function(data) {
				console.log(data);
				$('#kilometers').val(data.kilometer.kilometers)
				$('#date').val(data.kilometer.date);
				$('#vehicle-group-select').val(data.vehicle.vehicle_group_id);
				$('#vl').val(data.vehicle.id);
				$('.select2').select2();
			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function deleteKilometer(kilometerId) {
		var kilometerId = kilometerId;
		$('#confirmModal').modal('show');
		var malfunction_name = $('#malfunctionDetailsName').val();
		$('#confirm .modal-body .remove-malfunction-name').text(malfunction_name);
		$('#malfunction-delete-form').attr('action', '/kilometersDelete/' + kilometerId);
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
		let costTypeFilter = '';
		let dateToFilter = '';
		let dateFromFilter = '';


		
          // Event listener for the filter inputs
        $('#statusFilter, #grupaVozilaFilter, #podkategorijaFilter, #categoryFilter, #markaFilter, #modelFilter').on('change', function() {
            statusFilter = $('#statusFilter').val();
            grupaVozilaFilter = $('#grupaVozilaFilter').val();
            podkategorijaFilter = $('#podkategorijaFilter').val();
            categoryFilter = $('#categoryFilter').val();
            markaFilter = $('#markaFilter').val();
			modelFilter = $('#modelFilter').val();
			costTypeFilter = $('#costTypeFilter').val();
			dateToFilter = $('#dateToFilter').val();
			dateFromFilter = $('#dateFromFilter').val();
            $('#suppliersTable').DataTable().ajax.reload();
        });

        $('#suppliersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '<?php echo e(route('getKilometers')); ?>',
                    type: 'GET',
                    data: function (d) {
						d.statusFilter = statusFilter;
                        d.grupaVozilaFilter = grupaVozilaFilter;
                        d.podkategorijaFilter = podkategorijaFilter;
                        d.categoryFilter = categoryFilter;
                        d.markaFilter = markaFilter;
						d.modelFilter = modelFilter;
						d.costTypeFilter = costTypeFilter;
						d.dateToFilter = dateToFilter;
						d.dateFromFilter = dateFromFilter;
                    },
                    deferRender: true,
                    dataSrc: function (json) {
                        json.recordsTotal = json.recordsTotal; 
                        json.recordsFiltered = json.recordsFiltered;
                        return json.data; 
                    }
                },
				columns: [
							{ data: '0', name: 'name' },
							{ data: '1', name: 'brand' },
							{ data: '2', name: 'model' },
							{ data: '3', name: 'status' },
							{ data: '4', name: 'license_plate' },
							{ data: '5', name: 'created_at' },
							{ data: '6', name: 'kilometers' },
							{ data: '7', name: 'km_expectancy' },
							{ data: '8', name: 'Driver' },
							{ data: '9', name: 'Driver_contact' },
							{ data: '10', name: 'Opcije' },
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
                    sInfoEmpty:    'Prikazuje se 0 do 0 od ukupno 0 unosa', // Postavite željeni tekst za prikaz broja unosa
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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/kilometers/index.blade.php ENDPATH**/ ?>