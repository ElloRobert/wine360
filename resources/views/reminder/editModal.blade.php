

<div class="modal" id="editReminderModal" role="dialog" aria-labelledby="editReminderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/interface/close.svg') }}"></button>
				<h3 class="modal-title modal-naslov">{{ trans('reminder.editReminder') }}</h3>
            </div>
            <div class="modal-body">	
			<form id="reminder-update-form" method="POST" action="" enctype="multipart/form-data"> 
				{{ csrf_field() }}
				<div style="padding: 0; padding-bottom: 30px;" class="modal-body">
					<div class="row">
						<div class="row">
							<div class="col-xs-12 col-sm-6"> 
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label for="malfunctionDetailsName">{{ trans('malfunction.malfunctionName') }}</label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<input class="form-required form-control1" type="text" name="edit_reminder_name" id="editReminderName" value="" />
										</div>
										<div class="form-group">
											@if($errors->has('malfunctionDetailsName'))
											<span class="help-block text-left">
												<strong>{{ $errors->first('malfunctionDetailsName') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							

								<div class="col-xs-10 col-sm-10">
									<label class="control-label" for="edit-add-reminder-category">{{ trans('reminder.addReminderCategory') }}</label>
								<div class="form-group">
									<input id="edit-add-reminder-category" class="form-control1" type="text" name="edit_add_reminder_category" value="{{ old('add_reminder_category') }}"/>
								</div>
								</div>
							</div>
								<div class="col-xs-12 col-sm-6"> 
								<div class="col-xs-12 padding0">
									<div class="col-xs-10 col-sm-10">
										<label>{{ trans('malfunction.priority') }}</label>
									</div>
									<div class="col-xs-10 col-sm-10">
										<div class="form-group">
											<select class="form-control1" name="editReminderPriority" id="edit_reminder_Priority">
												<option value="">-</option>
												@foreach($priorities as $priority)
													<option value="{{$priority->id}}" >{{$priority->name}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											@if($errors->has('malfunctionKilometersTraveled'))
											<span class="help-block text-left">
												<strong>{{ $errors->first('malfunctionKilometersTraveled') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
						<div class="col-xs-12 col-sm-6">
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="malfunctionDetails">{{ trans('malfunction.malfunctionDetails') }}</label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<textarea class="form-control1" name="editReminderDetails" id="editReminderDetails"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label for="reminder-date">{{ trans('reminder.reminderDate') }}</label>
								</div>
	
								<div class="col-xs-10 col-sm-10">
									<div class="form-group input-group date">
										<input id="edit-reminder-date" class="form-control1 datetime-input" type="text" name="edit_reminder_date" value="{{ old('malfunction_date', Carbon\Carbon::now()->format('d.m.Y H:i:s')) }}"/>
										<span class="input-group-addon">
											<label for="reminder-date">
												<span class="glyphicon glyphicon-calendar"></span>
											</label>
										</span>
									</div>
									<div class="form-group">
										@if($errors->has('reminder_date'))
										<span class="help-block text-left">
											<strong>{{ $errors->first('reminder_date') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-xs-12 padding0">
								<div class="col-xs-10 col-sm-10">
									<label>{{ trans('reminder.recurring') }}</label>
								</div>
								<div class="col-xs-10 col-sm-10">
									<div class="form-group">
										<select class="form-control1" name="edit_recurring_reminder_id" id="edit_recurring_reminder_id">
											<option value="0" selected>Ne</option>
											@foreach($recurring_reminders as $recurring_reminder)
											<option value="{{$recurring_reminder->id}}">{{trans($recurring_reminder->name)}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										@if($errors->has('reminderPriority'))
										<span class="help-block text-left">
											<strong>{{ $errors->first('reminderPriority') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-xs-10 col-sm-10">
								<div style="display: none;" class="alert alert-danger" role="alert">
									{{ trans('malfunction.fieldRequired') }}
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
            </div>
				<div class="modal-footer">
					@role('private')
					@if(Auth::user()->ownsAnyVehicle())
						<div class="col-xs-12 padding0 text-right">
							<button type="submit" class="default-button">{{ trans('default.save') }}</button>
						</div>
					@endif
					@endrole
	
					@role('admin|legal|employee')
					<div class="col-xs-12 padding0 text-center">
						<button type="submit" class="btn gumb mt-15">{{ trans('default.save') }}</button>
					</div>
					@endrole
				</div>
			</form>
    </div>
</div>
</div>

<script>
    		// Dohvaćanje elemenata input polja
		var netoInputAdd = $('#malfunction-cost-neto-add');
		var vatPercentInputAdd = $('#malfunction-cost-vat-add');
		var brutoInputAdd = $('#malfunction-cost-bruto-add');
		// Osluškivanje promjena u netoInput polju
		netoInputAdd.on('input', updateBrutoValueAdd);
		// Osluškivanje promjena u vatPercentInput polju
		vatPercentInputAdd.on('input', updateBrutoValueAdd);

		// Funkcija za ažuriranje vrijednosti u brutoInput polju
		function updateBrutoValueAdd() {
			// Dohvaćanje vrijednosti iz netoInput i vatPercentInput polja
			var netoValueAdd = parseFloat(netoInputAdd.val()) || 0;
			var vatPercentAdd = parseFloat(vatPercentInputAdd.val()) || 0;
			// Izračunavanje bruto vrijednosti
			var brutoValueAdd = netoValueAdd * (1 + vatPercentAdd / 100);
			// Postavljanje izračunate vrijednosti u brutoInput polje
			brutoInputAdd.val(brutoValueAdd.toFixed(2)); // Postavljanje na dvije decimale
		}
</script>

