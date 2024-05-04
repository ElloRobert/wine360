@extends('layouts.dashboard')

@section('body_class', 'body__interface')

@section('dashboard-content')
<style>
	.table-vehicles{
		margin-top: 50px;
	}
</style>
<div class="home-dashboard-content">
	<div class="row vehicles-home text-left mt-15">
		<!-- Left side - img -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@role('admin|legal|employee')
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-6 padding0 naslov">
							<h1>{{ trans('users.title') }}</h1>
						</div>
						<div class="col-xs-5 padding0" >
						</div>
						@role('admin|private|legal')
							@role('private')
								@if(Auth::user()->ownsAnyVehicle())
									<a style="margin-left: 6px;" id="add-vehicle" class="default-button gumb" href="javascript:void(0)">{{ trans('users.add') }} +</a>
								@endif
							@endrole

							@role('admin|legal')
								<div class="col-xs-1 padding0" style="display: flex; justify-content: flex-end;">
									<button type="button" class="btn gumb" data-toggle="modal" data-target="#addUserModal" >
										{{ trans('users.add') }} +
									</button>
								</div>
							@endrole
						@endrole
					</div>
				</div>
				@if(Session::has('message'))
					<div class="row">
						<div @role('admin|legal') style="margin-top: 20px;" @endrole class="col-xs-12">
							<div class="alert alert-danger" role="alert">
								{{ Session::get('message') }}
							</div>
						</div>
					</div>
		  		@endif
				<div class="panel panel-default" style="background-color: white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#" id="activeWorkers">Aktivni</a>
							</li>
							@role('employee')
								<li style="display:none">
									<a href="#" id="inactiveWorkers">Arhiva</a>
								</li>
							@endrole
							@role('admin|legal|private')
								<li>
									<a href="#" id="inactiveWorkers">Arhiva</a>
								</li>
							@endrole

						</ul>
					</div>
					<div class="panel-body">
						<div class="row" id="table-activeWorkers">
							<div class="col-xs-12 mt-15">
								<table id="activeWorkersTable" class="display table" style="width:100%">
									<thead>
										<tr>
											<th>Ime i prezime</th>
											<th>Adresa</th>
											<th>E-mail</th>
											<th>Opcije</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row d-none" id="table-inactiveWorkers">
							<div class="col-xs-12 mt-15">
								<table id="inactiveWorkersTable" class="display table" style="width:100%">
									<thead>
										<tr>
											<th>Ime i prezime</th>
											<th>Adresa</th>
											<th>E-mail</th>
											<th>Opcije</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			@endrole
			
		</div>
		@if(!Auth::user()->hasRole('employee'))
			{{-- @include('users.addModal') --}}
			@include('users.confirmModal')
			@include('users.archiveUserModal')
		@endif
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


	function editUser(userId) {
		var userId = userId;
		$('#addUserModal').modal('show');
		$.ajax({
			type: "POST",
			url: "{{ route('user.details.edit') }}", 
			data: { 
				id: userId,
				_token: "{{ csrf_token() }}",
			},
			success: function(data) {
				console.log(data);
				$('#user_id').val(data.user.id)
				$('#name').val(data.user.name);
				$('#email').val(data.user.email);
				$('#address').val(data.user.address);
			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function archiveUser(userId){
		$('#archive').modal('show');
		$('#malfunction-archive-form').attr('action', 'users/Archive/' + userId);
		$('#archive').modal({ backdrop: 'static', keyboard: false });
	}

	function activateUser(userId){
		$('#archive').modal('show');
		$('#malfunction-archive-form').attr('action', 'users/Activate/' + userId);
		$('#archive').modal({ backdrop: 'static', keyboard: false });
	}

	function deleteUser(userId) {
		var userId = userId;
		$('#confirm').modal('show');
		$('#malfunction-delete-form').attr('action', '/users/' + userId);
		$('#confirm').modal({ backdrop: 'static', keyboard: false });
	
	}

	

	
	
	$(function() {
        $('#activeWorkersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '{{ route('getActiveUsers') }}',
                    type: 'GET',
                    data: function (d) {
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
						{ data: '1', name: 'address' },
						{ data: '2', name: 'email' },
						{ data: '3', name: 'Opcije' },
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

	$(function() {
        $('#inactiveWorkersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '{{ route('getInactiveUsers') }}',
                    type: 'GET',
                    data: function (d) {
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
						{ data: '1', name: 'address' },
						{ data: '2', name: 'email' },
						{ data: '3', name: 'Opcije' },
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


    // Set up click event for the 'Aktivni' link
    $('#activeWorkers').on('click', function () {
        // Add 'active' class to the clicked link's parent <li>
        $(this).parent("li").addClass("active");
        // Remove 'active' class from the other link's parent <li>
        $("#inactiveWorkers").parent("li").removeClass("active");
            // Show the active workers table
        $("#table-activeWorkers").removeClass("d-none");
            // Hide the inactive workers table
        $("#table-inactiveWorkers").addClass("d-none");
    });

        // Set up click event for the 'Arhiva' link
    $('#inactiveWorkers').on('click', function () {
        // Add 'active' class to the clicked link's parent <li>
		console.log("tu sam")
        $(this).parent("li").addClass("active");
        // Remove 'active' class from the other link's parent <li>
        $("#activeWorkers").parent("li").removeClass("active");
            // Show the inactive workers table
        $("#table-inactiveWorkers").removeClass("d-none");
            // Hide the active workers table
        $("#table-activeWorkers").addClass("d-none");
    });
    
	
</script>
@endsection