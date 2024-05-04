<div class="modal" id="confirm">
	<div class="modal-dialog">
		<div class="modal-content model-content-delete">
			<div class="modal-header" style="border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
				<h3 class="modal-title model-title-delete"><?php echo e(trans('malfunction.deleteConfirmation')); ?></h3>
			</div>
			<div class="modal-body">
				<div class="row marginTop tekst" style="display: flex; justify-content: center; align-items: center;">
					<p><?php echo e(trans('reminder.deleteConfirmationText')); ?> <span class="remove-malfunction-name"></span>?</p>
				</div>
				<div style="display: flex; justify-content: center; align-items: center;">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-2">
							<form id="malfunction-delete-form" method="POST" action="<?php echo e(route('vehicles.maintenance')); ?>">
								<?php echo e(csrf_field()); ?>

								<?php echo e(method_field('DELETE')); ?>

								<input style="float: right;" type="submit" class="btn  gumbObrisi" value="<?php echo e(trans('default.delete')); ?>">
							</form>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<button type="button" class="btn gumbZatvori" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
						</div>
						<div class="col-md-2"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Projekti\Wine360\resources\views/reminder/confirmModal.blade.php ENDPATH**/ ?>