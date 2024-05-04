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
						<div class="col-xs-5 padding0 naslov">
							<h1>{{ trans('message.title') }}</h1>
						</div>	
						<div class="col-xs-3 padding0" >
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="{{ asset('img/interface/filteri.svg') }}" class="">
							</button>
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						@role('admin')
							<div class="col-md-3">
									<select id="company-select" name="company-select" class="form-control1">
										<option value="">Sve tvrtke</option>
										@foreach ($configurations as $configuration)
											<option value="{{$configuration->id}}">{{$configuration->applicationName}}</option>
										@endforeach
									</select>
							</div>
						@endrole
						
						<div class="col-md-3">
						
						</div>
				
						<div class="col-md-3">
							
						</div>
						
						
					</div>
					<div class="row mb-3 filteri mt-5" style="margin-top: 15px">
						<div class="col-md-3">
						
						</div>
						<div class="col-md-3">
							
						</div>
						<div class="col-md-3">
						
						</div>
						<div class="col-md-3">
							
						</div>
					</div>
				</div>
				@if(Session::has('message'))
					<div @role('admin|legal') style="margin-top: 20px;" @endrole class="col-xs-12">
						<div class="alert alert-danger" role="alert">
							{{ Session::get('message') }}
						</div>
					</div>
		  		@endif
				<div class="row table-vehicles">
					<div class="col-xs-12">
						<table id="winesTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Korisnik</th>
									<th>Email</th>
									<th>Datum i vrijeme </th>
									<th>Upit</th>
									<th>Opcije</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			@endrole
		
		</div>
		@include('wine.addModal')
		@if(!Auth::user()->hasRole('employee'))
			@include('wine.confirmModal')
		@endif
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({ html:true });



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


	function editWine(wine_id) {
		var wine_id = wine_id;
		$('#addWineModal').modal('show');
		$.ajax({
			type: "POST",
			url: "{{ route('wines.details') }}", 
			data: { 
				id: wine_id,
				_token: "{{ csrf_token() }}",
			},
			success: function(data) {
				
				$('#wine_id').val(data.id)
				$('#wine-name').val(data.name);
				$('#wine-harvest-date').val(data.harvest_date);
				$('#wine-harvest-method').val(data.harvest_method);
				$('#wine-vintage-variety').val(data.vintage_variety);
				$('#wine-nutrition-data').val(data.nutrition_data);
				$('#wine-allergen-declaration').val(data.allergen_declaration);
				$('#wine-country-of-origin').val(data.country_of_origin);
				$('#wine-importer-bottler-manufacturer').val(data.importer_bottler_manufacturer);
				$('#wine-geographical-origin-labels').val(data.geographical_origin_labels);
				$('#wine-harvest-year').val(data.harvest_year);
				$('#wine-alcohol-by-volume').val(data.alcohol_by_volume);
				$('#wine-net-quantity-ml').val(data.net_quantity_ml);
				$('#wine-sugar-content').val(data.sugar_content);
				$('#wine-grape-variety-harvest-specific').val(data.grape_variety_harvest_specific);
				$('#wine-product-description').val(data.product_description);
				$('#wine-expiration-date').val(data.expiration_date);
				$('#qrCode').html(data.qr);

				$('.select2').select2();

			},
			error: function(data){
				console.log('Error');
			}
		});
	}

	function deleteWine(wine_id) {
		var wine_id = wine_id;
		$('#confirmModal').modal('show');
		$('#malfunction-delete-form').attr('action', '/wines/' + wine_id);
		$('#confirm').modal({ backdrop: 'static', keyboard: false });
	
	}
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
            $('#winesTable').DataTable().ajax.reload();
        });

        $('#winesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '{{ route('getMessages') }}',
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
						{ data: '1', name: 'vintage_variety' },
						{ data: '2', name: 'harvest_year' },
						{ data: '3', name: 'country_of_origin' },
						{ data: '4', name: 'opcije' },
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
@endsection