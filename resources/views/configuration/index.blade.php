@extends('layouts.dashboard')

@section('body_class', 'body__interface')

@section('dashboard-content')

<div class="home-dashboard-content configuration-home">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-5 padding0 naslov">
				<div class="row ">
					<div class="col-xs-12">
						<h2>{{ trans('configuration.configurationApp') }}</h2>
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-3"> -->	
			<div class="col-xs-3 padding0" >
			</div>
			<div class="col-xs-4 mt-10 text-right">
				
			</div>
		</div>
	</div>

	<div class="row mt-45" id="editUserSettings">
		<div class="col-xs-12">
			<div class="col-xs-12 config-message padding0">
				<div class="row">
					@if(Session::has('message-success'))
						<div class="alert alert-success mt-15" role="alert">
							<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-ok"></span>
								{{ Session::get('message-success') }}
						</div>
					@endif
				</div>
			</div>
			<div class="col-xs-12 col-md-6 mt-45">
				<form id="configuration" @role('admin|private|legal') method="POST" action="{{ route('configurationUpdate') }}" @endrole >
					{{ csrf_field() }}
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationAddress">{{ trans('configuration.applicationAddress') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationAddress" id="applicationAddress" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationAddress }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationAddress }}" @endrole/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationAddress'))
							<span class="help-block text-center">
								<strong>{{ $errors->first('applicationAddress') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationAddress2">{{ trans('configuration.applicationAddress2') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationAddress2" id="applicationAddress2" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationAddress2 }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationAddress2 }}" @endrole />
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationAddress2'))
								<span class="help-block text-center">
									<strong>{{ $errors->first('applicationAddress2') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationCity">{{ trans('configuration.applicationCity') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationCity" id="applicationCity" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationCity }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationCity }}" @endrole/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationCity'))
							<span class="help-block text-center">
								<strong>{{ $errors->first('applicationCity') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationState'))
							<span class="help-block text-center">
								<strong>{{ $errors->first('applicationState') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationZip">{{ trans('configuration.applicationZip') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationZip" id="applicationZip" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationZip }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationZip }}" @endrole/>
						</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationZip'))
								<span class="help-block text-center">
									<strong>{{ $errors->first('applicationZip') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationCountry">{{ trans('configuration.applicationCountry') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationCountry" id="applicationCountry" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationCountry }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationCountry }}" @endrole/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationCountry'))
								<span class="help-block text-center">
									<strong>{{ $errors->first('applicationCountry') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 mt-45">
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="applicationPhone">{{ trans('configuration.applicationPhone') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="applicationPhone" id="applicationPhone" @role('employee') disabled value="{{ Auth::user()->legalEntityUser->configuration->applicationPhone }}" @endrole @role('admin|legal|private') value="{{ Auth::user()->configuration->applicationPhone }}" @endrole/>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('applicationPhone'))
								<span class="help-block text-center">
									<strong>{{ $errors->first('applicationPhone') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 padding0">
							@if ($errors->has('wineryDescription'))
								<span class="help-block text-center">
									<strong>{{ $errors->first('wineryDescription') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-xs-10 col-sm-10">
						<label class="control-label" for="admin-reports">{{ trans('configuration.emailForReports') }}</label>
					</div>
					<div class="col-xs-10 col-sm-10">
						<input class="form-control1" type="text" name="admin-reports" id="admin-reports" disabled value="{{ App\User::find(1)->configuration->emailForReports }}" />
					</div>
					<div class="form-group">
					</div>
					</div>
					@role('admin|private|legal')
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 text-center padding0 mt-45">
								<button type="submit" class="btn gumb">{{ trans('configuration.saveConfiguration') }}</button>
							</div>
						</div>
					@endrole
				</form>
			</div>

			@role('legal|employee')
			<div class="col-xs-12 col-md-6">
				@unless($active_employees->isEmpty())
				<div class="col-xs-12 padding0 employees">
					<h3>{{ trans('configuration.listEmployees') }}</h3>
					<div class="row default-div-table">
						<div class="row default-div-table-header">
							<div class="@role('legal') col-xs-4 @endrole @role('employee') col-xs-6 @endrole">
								<strong>{{ trans('user.userName') }}</strong>
							</div>
							<div class="@role('legal') col-xs-4 @endrole @role('employee') col-xs-6 @endrole text-center">
								<strong>{{ trans('user.userEmail') }}</strong>
							</div>
							@role('legal')
								<div class="col-xs-4 text-center">
									<strong>{{ trans('default.action') }}</strong>
								</div>
							@endrole
						</div>

						@foreach($active_employees as $employee)
							<div class="row default-div-table-rows">
								<div class="@role('legal') col-xs-4 @endrole @role('employee') col-xs-6 @endrole">
									<span class="vertical-align-center">{{ $employee->name }}</span>
								</div>
								<div class="@role('legal') col-xs-4 @endrole @role('employee') col-xs-6 @endrole text-center">
									<span class="vertical-align-center">{{ $employee->email }}</span>
								</div>

								@role('legal')
								<div class="col-xs-4 text-right padding0">
									<a data-em="{{ $employee->id }}" class="default-button remove-employee-model">
										<span class="glyphicon glyphicon-trash" style="vertical-align:-1px;"></span>
									</a>
								</div>

								<div class="modal" id="remove-employee-model-{{ $employee->id }}" style="display: none;">
									<div class="modal-dialog">
										<div class="modal-content model-content-delete">
											<div class="modal-header modal-header-delete">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title model-title-delete">{{ trans('configuration.deleteConfirmation') }}</h4>
											</div>
											<div class="modal-body">
												<div class="row marginTop">
													<p>{{ trans('configuration.deleteConfirmationText') }} {{ $employee->name }}?</p>
												</div>
											</div>
											<div class="modal-footer">
												<form method="POST" action="{{ route('delete.employee', [$employee->id]) }}">
													{{ csrf_field() }}
													{{ method_field('DELETE') }}

													<button title="{{ trans('default.removeEmployee') }} {{ $employee->name }}" type="submit" class="btn gumb">
														{{ trans('default.confirmDeactivationButton') }}
													</button>
												</form>

												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">{{ trans('default.close') }}</button>
											</div>
										</div>
									</div>
									</div>
								@endrole
							</div>
						@endforeach
					</div>
				</div>
				@endunless
				

				
			</div>
			@endrole
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
	$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);

	$(window).resize(function () {
		$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);
	});

	if ($('.config-message > div > div').css('display') == 'block') {
		setTimeout(function () {
				$('.config-message > div > div').hide();
			},6000);
	}
	if ($('.add-employee-message > div > div').css('display') == 'block') {
		setTimeout(function () {
				$('.add-employee-message > div > div').hide();
			}, 6000);
	}

	$('.remove-employee-model').on('click', function (e) {
		e.preventDefault();
		$('#remove-employee-model-'+$(this).data('em')).modal({ backdrop: 'static', keyboard: false });
	});

	$('.activate-employee-model').on('click', function (e) {
		e.preventDefault();
		$('#activate-employee-model-'+$(this).data('em')).modal({ backdrop: 'static', keyboard: false });
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const vehicleGroupSelect = document.querySelector('select[name="vehicleGroup"]');
    const subcategoryContainer = document.getElementById('subcategoryContainer');

	function deleteSubcategory(selectedValue, subcategoryId) {
		axios.delete(`/configuration/subcategory/destroy/${subcategoryId}`)
			.then(response => {
				// Ovdje možete dodati logiku za ažuriranje prikaza subkategorija nakon brisanja
				updateSubcategories(selectedValue);
			})
			.catch(error => {
				console.error(error);
			});
	}

	function updateSubcategories(selectedValue) {
		axios.get(`/configuration/subcategory/${selectedValue}`)
			.then(response => {
				subcategoryContainer.innerHTML = '';
				
				var subcategories = Array.isArray(response.data) ? response.data : Object.values(response.data);
				subcategories = subcategories[0];
				subcategories.forEach(subcategory => {
					const subcategoryRow = document.createElement('div');
					subcategoryRow.classList.add('row'); 
					subcategoryRow.style.marginBottom = '5px';
					// Prvi stupac za naziv
					const subcategoryNameColumn = document.createElement('div');
					subcategoryNameColumn.classList.add('col-md-6');

					// Drugi stupac za gumb "Izbriši"
					const deleteColumn = document.createElement('div');
					deleteColumn.classList.add('col-md-6');

					const subcategoryElement = document.createElement('div');
					const subcategoryName = Array.isArray(subcategory) ? subcategory.data.name : subcategory.name;
					subcategoryElement.textContent = subcategoryName;

					// Dodajte <a> element za brisanje s Bootstrap klasom btn-danger i btn-sm za manju veličinu
					const deleteLink = document.createElement('a');
					deleteLink.textContent = 'Izbriši';
					deleteLink.href = '#';
					deleteLink.classList.add('btn', 'btn-danger', 'btn-sm'); // Dodajte Bootstrap klasu

					deleteLink.addEventListener('click', function (e) {
						e.preventDefault();
						deleteSubcategory(selectedValue, subcategory.id);
					});

					subcategoryNameColumn.appendChild(subcategoryElement);
					deleteColumn.appendChild(deleteLink);

					subcategoryRow.appendChild(subcategoryNameColumn);
					subcategoryRow.appendChild(deleteColumn);
					subcategoryContainer.appendChild(subcategoryRow);
				});

				addAddSubcategoryLink(selectedValue);
			})
			.catch(error => {
				console.error(error);
			});
	}

	function createSubcategoryForm(selectedValue) {

		const addSubcategoryLink = subcategoryContainer.querySelector('.add-subcategory-link');
		if (addSubcategoryLink) {
			addSubcategoryLink.remove();
		}

		const subcategoryRow = document.createElement('div');
		subcategoryRow.classList.add('row', 'mb-2'); 

		const subcategoryForm = document.createElement('form');
		subcategoryForm.classList.add('form-inline');

		const nameInputColumn = document.createElement('div');
		nameInputColumn.classList.add('col-md-7'); 

		const nameLabel = document.createElement('label');
		nameLabel.classList.add('sr-only');
		nameLabel.textContent = 'Name:';

		const nameInput = document.createElement('input');
		nameInput.classList.add('form-control', 'mr-2');
		nameInput.setAttribute('type', 'text');
		nameInput.setAttribute('name', 'name');

		const spacerColumn = document.createElement('div');
		spacerColumn.classList.add('col-md-2'); 

		const saveLinkColumn = document.createElement('div');
		saveLinkColumn.classList.add('col-md-2'); 

		const saveLink = document.createElement('a');
		saveLink.textContent = 'Spremi';
		saveLink.href = '#';
		saveLink.classList.add('btn', 'btn-success'); 

		saveLink.addEventListener('click', function (e) {
			e.preventDefault();
			const newSubcategoryName = nameInput.value;
			if (newSubcategoryName.trim() !== '') {
				axios.post(`/configuration/subcategory/store/${selectedValue}`, {
					name: newSubcategoryName
				})
					.then(response => {
						nameInput.value = '';
						updateSubcategories(selectedValue);
					})
					.catch(error => {
						console.error(error);
					});
			}
		});

		nameInputColumn.appendChild(nameLabel);
		nameInputColumn.appendChild(nameInput);

		saveLinkColumn.appendChild(saveLink);

		subcategoryForm.appendChild(nameInputColumn);
		subcategoryForm.appendChild(spacerColumn); // Dodajte prazan stupac
		subcategoryForm.appendChild(saveLinkColumn);

		subcategoryRow.appendChild(subcategoryForm);
		subcategoryContainer.appendChild(subcategoryRow);
	}

	function addAddSubcategoryLink(selectedValue) {
		const addSubcategoryLink = document.createElement('a');
		addSubcategoryLink.textContent = '+ Podkategorija';
		addSubcategoryLink.href = '#';
		addSubcategoryLink.classList.add('btn', 'btn-success', 'add-subcategory-link'); 

		addSubcategoryLink.addEventListener('click', function (e) {
			e.preventDefault();
			createSubcategoryForm(selectedValue);
		});

		subcategoryContainer.appendChild(addSubcategoryLink);
	}


    vehicleGroupSelect.addEventListener('change', function () {
        const selectedValue = vehicleGroupSelect.value;
        if (selectedValue !== '') {
            updateSubcategories(selectedValue);
        } else {
            subcategoryContainer.innerHTML = '';
        }
    });

	// Odmah nakon učitavanja stranice, pozovite updateSubcategories s trenutnom vrijednošću selecta
	document.addEventListener('DOMContentLoaded', function () {
		const selectedValue = vehicleGroupSelect.value;
		if (selectedValue !== '') {
			updateSubcategories(selectedValue);
		}
	});

	// Dodajte event listener za promjenu u select elementu
	vehicleGroupSelect.addEventListener('change', function () {
		const selectedValue = vehicleGroupSelect.value;

		if(selectedValue == "2"){
			$('.vehicleGroupSubcategory').css('display', 'none');
		}else if (selectedValue !== '') {
			$('.vehicleGroupSubcategory').css('display', '');
			updateSubcategories(selectedValue);
		} else {
			subcategoryContainer.innerHTML = '';
		}
	});
</script>

@endsection