<div class="modal" id="archive">
	<div class="modal-dialog">
		<div class="modal-content model-content-delete">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/interface/close.svg') }}"></button>
				<h3 class="modal-title model-title-delete">{{ trans('users.confirmArchive') }}</h3>
			</div>
			<div class="modal-body">
				<div class="row marginTop tekst" style="display: flex; justify-content: center; align-items: center;">
					<p>{{ trans('users.archiveConfirmationText') }} <span class="remove-malfunction-name"></span>?</p>
				</div>
				<div style="display: flex; justify-content: center; align-items: center;">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-2">
							<form id="malfunction-archive-form" method="POST" action="{{ route('users') }}">
								{{ csrf_field() }}
								<input style="float: right;" type="submit" class="btn  gumbObrisi" value="{{ trans('users.confirm') }}">
							</form>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<button type="button" class="btn  gumbZatvori" data-dismiss="modal">{{ trans('default.close') }}</button>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>