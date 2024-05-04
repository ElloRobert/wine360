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
							<h1>{{ trans('winery.title') }}</h1>
						</div>	
						<div class="col-xs-3 padding0" >
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="{{ asset('img/interface/filteri.svg') }}" class="">
							</button>
							@role('admin|private|legal')
									<button type="button" class="btn gumb" data-toggle="modal" data-target="#addWineryModal" id="addWineryModalButton">
										{{ trans('winery.add') }} +
									</button>
							@endrole
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						@role('admin')
							<div class="col-md-3">
									<select id="company-select" name="company-select" class="form-control1">
										<option value="">Sve vinarije</option>
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
						<table id="wineryTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Naziv</th>
									<th>Adresa</th>
									<th>Mjesto</th>
									<th>Zemlja</th>
									<th>Email</th>
									<th>Telefon</th>
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
			@include('winery.confirmModal')
			@include('winery.addModal')
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
	function editWinery(winery_id) {
		var winery_id = winery_id;
		$('#addWineryModal').modal('show');

		$.ajax({
			type: "POST",
			url: "{{ route('winery.details') }}", 
			data: { 
				id: winery_id,
				_token: "{{ csrf_token() }}",
			},
			success: function(data) {
				$('#configuration_id').val(data.id);
				$('#winery-applicationName').val(data.applicationName);
				$('#winery-applicationAddress').val(data.applicationAddress);
				$('#winery-applicationCity').val(data.applicationCity);
				$('#winery-applicationZip').val(data.applicationZip);
				$('#winery-applicationCountry').val(data.applicationCountry);
				$('#winery-applicationPhone').val(data.applicationPhone);
				$('#winery-emailForReports').val(data.emailForReports);
				$('#winery-OIB').val(data.id);

				ClassicEditor.create( document.querySelector('#winery_description') )
                .then( editor => {
                    editor.setData(data.winery_description);
                })
                .catch( error => {
                    console.error( error );
                });

				ClassicEditor.create( document.querySelector('#winery-innovations') )
                .then( editor => {
                    editor.setData(data.innovations);
                })
                .catch( error => {
                    console.error( error );
                });

				ClassicEditor.create( document.querySelector('#winery-packaging') )
                .then( editor => {
                    editor.setData(data.packaging);
                })
                .catch( error => {
                    console.error( error );
                });

				ClassicEditor.create( document.querySelector('#winery-wine_assortment') )
                .then( editor => {
                    editor.setData(data.wine_assortment);
                })
                .catch( error => {
                    console.error( error );
                });

				ClassicEditor.create( document.querySelector('#winery-awards') )
                .then( editor => {
                    editor.setData(data.awards);
                })
                .catch( error => {
                    console.error( error );
                });
			
				
				// $('#winery-wine_assortment').val(data.wine_assortment);
				// $('#winery-awards').val(data.awards);
				$('.select2').select2();
			},
			error: function(data){
				console.log('Error');
			}
		});
	
	}

	function deleteWinery(winery_id) {
		var winery_id = winery_id;
		$('#confirmModal').modal('show');
		$('#malfunction-delete-form').attr('action', '/winery/' + winery_id);
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
          $('#statusFilter').on('change', function() {
            $('#wineryTable').DataTable().ajax.reload();
        });

        $('#wineryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                    url: '{{ route('getWineries') }}',
                    type: 'GET',
                    data: function (d) {
                        d.statusFilter = statusFilter;
                    },
                    deferRender: true, // Enable deferred rendering
                    dataSrc: function (json) {
                        json.recordsTotal = json.recordsTotal; // Add recordsTotal property
                        json.recordsFiltered = json.recordsFiltered; // Add recordsFiltered property
                        return json.data; // Return the data array
                    }
                },
				columns: [
						{ data: '0', name: 'applicationName' },
						{ data: '1', name: 'applicationAddress'},
						{ data: '2', name: 'applicationCity' },
						{ data: '3', name: 'applicationState' },
						{ data: '4', name: 'emailForReports' },
						{ data: '5', name: 'applicationPhone' },
						{ data: '6', name: 'opcije' },
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

	$('#addWineryModalButton').click(function() {
		ClassicEditor
            .create(document.querySelector('#winery_description'))
            .catch(error => {
                console.error("Greška pri kreiranju CKEditora za winery_description:", error);
            });
        ClassicEditor
            .create(document.querySelector('#winery-innovations'))
            .catch(error => {
                console.error("Greška pri kreiranju CKEditora za winery-innovations:", error);
            });
        ClassicEditor
            .create(document.querySelector('#winery-packaging'))
            .catch(error => {
                console.error("Greška pri kreiranju CKEditora za winery-packaging:", error);
            });
        ClassicEditor
            .create(document.querySelector('#winery-wine_assortment'))
            .catch(error => {
                console.error("Greška pri kreiranju CKEditora za winery-wine_assortment:", error);
            });
        ClassicEditor
            .create(document.querySelector('#winery-awards'))
            .catch(error => {
                console.error("Greška pri kreiranju CKEditora za winery-awards:", error);
            });
	})
	
</script>
@endsection