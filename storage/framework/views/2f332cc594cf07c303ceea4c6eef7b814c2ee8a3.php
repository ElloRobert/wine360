<div class="modal" id="confirm" >
	<div class="modal-dialog">
		<div class="modal-content model-content-delete">
			<div class="modal-header modal-header-delete">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title model-title-delete"><?php echo e(trans('malfunction.deleteConfirmation')); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row marginTop">
					<p><?php echo e(trans('vehicles.deleteConfirmationText')); ?> <span class="remove-malfunction-name"></span>?</p>
				</div>
			</div>
			<div class="modal-footer">
				<form id="malfunction-delete-form" method="POST" action="<?php echo e(route('vehicles.malfunction')); ?>">
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('DELETE')); ?>

					<input style="float: right;" type="submit" class="default-button default-button-delete" value="<?php echo e(trans('vehicles.delete')); ?>">
				</form>
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Projekti\wine360\resources\views/vehiclesAdd/confirmModal.blade.php ENDPATH**/ ?>