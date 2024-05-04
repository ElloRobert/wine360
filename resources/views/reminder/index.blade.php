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
							<div class="row ">
								<div class="col-xs-12">
									<h2>{{ trans('reminder.title') }}</h2>
								</div>
							</div>
						</div>
						<!-- <div class="col-xs-3"> -->	
						<div class="col-xs-3 padding0" >
						</div>
						<div class="col-xs-4 mt-10 text-right">
							<button type="button" class="btn" id="showFilteri">
								<img src="{{ asset('img/interface/filteri.svg') }}" class="">
							</button>
							@role('admin|private|legal|employee')
								@role('private')
									@if(Auth::user()->ownsAnyVehicle())
										<a style="margin-left: 6px;" id="add-vehicle" class="btn gumb" href="javascript:void(0)">{{ trans('reminder.addReminder') }} +</a>
									@endif
								@endrole
								@role('admin|legal|employee')
									<button type="button" class="btn gumb" id="openAddReminderModal" >
										{{ trans('reminder.addReminder') }} +
									</button>
								@endrole
							@endrole
						</div>
					</div>
				</div>
				<div class="filteri d-none" id="filteri">
					<div class="row mb-3  mt-5" style="margin-top: 15px">
						@role('admin')
							<div class="filter col-sm-2">
								<select id="company-select" name="company-select" class="form-control1">
									<option value="">Sve tvrtke</option>
									@foreach ($configurations as $configuration)
										<option value="{{$configuration->id}}">{{$configuration->applicationName}}</option>
									@endforeach
								</select>
							</div>
						@endrole
						<div class="filter col-sm-3 ">
							
						</div>
						<div class="filter col-sm-3 ">
						
						</div>
						<div class="filter col-sm-3 ">
							
						</div>
					</div>
				</div>
				<div class="row table-vehicles">
					<div class="col-xs-12">
						<table id="reminderTable" class="display table" style="width:100%">
							<thead>
								<tr>
									<th>Vinarija</th>
									<th>Naziv</th>
									<th>Opis</th>
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
			@endrole
			@if(Session::has('message'))
					<div @role('admin|legal') style="margin-top: 20px;" @endrole class="col-xs-12">
						<div class="alert alert-danger" role="alert">
							{{ Session::get('message') }}
						</div>
      			</div>
      		@endif
		</div>
		@include('reminder.confirmModal')
		@include('reminder.editModal')
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">


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
			$('#reminderTable').DataTable().ajax.reload();
		});

		$('#reminderTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '{{ route('getReminders') }}',
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
                    sInfoEmpty:    'Prikazuje se 0 do 0 od ukupno 0 unosa',
				}
		});
	});

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

	

		// Dodaj event listener na dugme
		$('#openAddReminderModal').on('click', function() {
			$('#addReminderModal').modal('show');
		});

	});

		
	function editReminder(reminderId) {
		var reminder_id = reminderId;
		$('#editReminderModal').modal('show');
		$.ajax({
			type: "GET",
			url: "{{ route('reminders.edit') }}",
			data: { 
				id: reminder_id,
				_token: "{{ csrf_token() }}",
			},
			success: function(data) {
				
				$('#reminder-update-form').attr('action', 'reminders/'+reminder_id); 

				$('#reminder-update-form #editReminderName').val(data.name);
				$('#reminder-update-form  #reminder-vehicle-group-select-edit').val(data.vehicles[0].vehicle_group_id);

					// Rest of your code...
					// First AJAX request to get the filtered vehicle list and subcategory based on the selected group.
				
				function formatDate(dateString) {
					if (!dateString) {
						return null;
					}

					const date = new Date(dateString);
					const year = date.getFullYear();
					const month = String(date.getMonth() + 1).padStart(2, '0');
					const day = String(date.getDate()).padStart(2, '0');

					return `${day}-${month}-${year}`;
				}

				const formattedDateEnd = formatDate(data.end_date_reminder);
			
				$('#reminder-update-form #edit_reminder_category').val(data.category);
				$('#reminder-update-form #edit_reminder_Priority').val(data.reminder_priority);
				$('#reminder-update-form #editReminderDetails').val(data.details);
				$('#reminder-update-form #edit-reminder-date').val(formattedDateEnd);
				$('#reminder-update-form #edit_recurring_reminder_id').val(data.recurring_reminder_id);
			},
			error: function(data){
				console.log('Error');
			}
		});

		$(document).ready(function () {
			// Dohvaćanje elemenata input polja
			var netoInputEdit = $('#malfunctionCostNeto');
			var vatPercentInputEdit = $('#malfunctionCostVAT');
			var brutoInputEdit = $('#malfunctionCostBruto');
				
			netoInputEdit.on('input', updateBrutoValueEdit);
				
			vatPercentInputEdit.on('input', updateBrutoValueEdit);

			function updateBrutoValueEdit() {
				var netoValueEdit = parseFloat(netoInputEdit.val()) || 0;
				var vatPercentEdit = parseFloat(vatPercentInputEdit.val()) || 0;
				var brutoValueEdit = netoValueEdit * (1 + vatPercentEdit / 100);
				brutoInputEdit.val(brutoValueEdit.toFixed(2));
			}
		});

		$('#malfunction-details-model').modal({ backdrop: 'static', keyboard: false }).on('click', '#submit-update-malfunction', function(){
		    // alert('da');
		    // console.log($('#malfunction-update-form select.vehicles-list-model').val());
		    
		    var vmid = $(this).data('vmid');
			var formInvalid = false;

			$('#malfunction-update-form .form-required').each(function() {
				if ($(this).val() === '') {
					formInvalid = true;
				}
			});
			if($('#malfunction-update-form select').val() === '') {
				formInvalid = true;
			}

			if(formInvalid){
				$('#malfunction-update-form .alert-danger').show();
			}else{
				// alert('false'+formInvalid);
				// $('#malfunction-details-model-'+$(this).data('vmid')+' form').submit();
				$('#malfunction-update-form').submit();
			}
		});

		$('#malfunction-details-model').on('hidden.bs.modal', function () {
		
			$('#malfunction-details-model .vertical-align-center.vehicle-current-status').html('');
		    $('#malfunction-update-form #malfunctionDetailsName').val('');
		    $('#malfunction-update-form select.vehicles-list-model').val('');
	    	$('#malfunction-update-form #malfunctionDetailsDate').val('');
	    	$('#malfunction-update-form #malfunctionDetailsEndDate').val('');
	    	$('#malfunction-update-form #malfunctionDetails').text('');
	    	$('#malfunction-update-form #malfunctionKilometersTraveled').val('');
	    	$('#malfunction-update-form #malfunctionCost').val('');
	    	$('#malfunction-update-form #malfunction-image-position-modal option').attr('selected', '');
	    	
	    	$('#malfunction-details-model .image-before-div .default-no-img-vehicle-before').css('background-image', '');

	    	$('#malfunction-details-model .image-after-div .default-no-img-vehicle-after').css('background-image', '');
		});
	}


	function deleteReminder(reminderId) {
		var reminder_id = reminderId;
		var deleteRoute = '{{ route("reminders.delete", ["id" => ":reminder_id"]) }}';
		deleteRoute = deleteRoute.replace(':reminder_id', reminder_id);
		// Now set the action attribute
		$('#malfunction-delete-form').attr('action', deleteRoute);
		$('#confirm').modal({ backdrop: 'static', keyboard: false });
	}


	function changeStatus(id) {
		$.ajax({
			type: 'GET',
			url: "{{ route('getReminder') }}",
			data: {
				_token: "{{ csrf_token() }}",
				id: id,
			},
			success: function(response){
				// Proverite da li postoji greška u odgovoru
				if (response.error) {
					console.error(response.error);
					return;
				}

				$('#reminderTable').DataTable().ajax.reload();
			},
			error: function(xhr, status, error) {
				console.error("AJAX request error:", status, error);
			}
		});
	}

</script>

@endsection