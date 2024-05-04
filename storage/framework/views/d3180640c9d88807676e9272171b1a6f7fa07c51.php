
<div class="modal" id="crop-modal-update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content model-content-update">
            <div class="modal-header modal-header-update">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title model-title-update"><?php echo e(trans('malfunction.editImage')); ?></h4>
            </div>

            <div class="modal-body">
				<div class="row">
					<div class="image-editor">
					
						<label for="malfunction-popup-edit-image-update" class="default-button">
		                    <?php echo e(trans('malfunction.chooseImage')); ?>

		                </label>
		                <br/>
		                <br/>
						<!-- <input type="file" class="cropit-image-input"> -->
						<input style="display: none;" id="malfunction-popup-edit-image-update" class="cropit-image-input" type="file" name="vehicle_malfunction_image">

						<div class="cropit-preview"></div>

						<div style="display: none;" class="setting-tools">
							<div class="image-size-label">
								Resize image
							</div>
							
							<input type="range" class="cropit-image-zoom-input">
							<br/>
							<div class="col-xs-9 padding0">
								<a href="javascript:void(0)" class="rotate-ccw default-button">Rotate counterclockwise</a>
								<a href="javascript:void(0)" class="rotate-cw default-button">Rotate clockwise</a>
							</div>
							<div class="col-xs-3 padding0 text-right">
								<a href="javascript:void(0)" class="save default-button" data-dismiss="modal">Save</a>
								<a href="javascript:void(0)" class="default-button" data-dismiss="modal">Close</a>
							</div>
						</div>
					</div>
				</div>
        	</div>
        </div>
    </div>
</div>

<script>
  	//Insert new malfunction crop popup
	$('.popup-crop-modal').on('click', function(e){
		e.preventDefault();
		$('#crop-modal').modal({ backdrop: 'static', keyboard: false });
	});

	$('#crop-modal .image-editor').cropit({
		smallImage: 'allow'
	});

	$('#crop-modal .rotate-cw').click(function() {
		$('#crop-modal .image-editor').cropit('rotateCW');
	});
	$('#crop-modal .rotate-ccw').click(function() {
		$('#crop-modal .image-editor').cropit('rotateCCW');
	});

	$('#malfunction-popup-edit-image').on('change', function(){
		$('.setting-tools').show();
	});

	$('#crop-modal .save').click(function() {

		var imageData = $('#crop-modal .image-editor').cropit('export');
		// $('#malfunction-popup-edit-image').val(imageData);
		$('#malfunction-store-form .default-no-img-vehicle').css('background-image', 'url('+imageData+')');
		$('#malfunction-edited-image').val(imageData);
		$('#malfunction-details-model-insert').css('opacity', '0');
		// window.open(imageData);
	});
	//Insert new malfunction crop popup
	$('.popup-crop-modal-update').on('click', function(e){
		e.preventDefault();
		$('#crop-modal-update .cropit-preview-image-container .cropit-preview-image').attr('src', '');
		$('.setting-tools').hide();
		$('#malfunction-details-model').css('opacity', '0');
		$('body').css('overflow', 'hidden');
		$('#malfunction-details-model').css('overflow-x', 'hidden');
		$('#malfunction-details-model').css('overflow-y', 'auto');
		$('#crop-modal-update .save').attr('data-pos', $(this).data('pos') );
		$('#crop-modal-update').modal({ backdrop: 'static', keyboard: false });
	});

	$('#crop-modal-update .image-editor').cropit({
		smallImage: 'allow'
	});

	$('#crop-modal-update .rotate-cw').click(function() {
		$('#crop-modal-update .image-editor').cropit('rotateCW');
	});
	$('#crop-modal-update .rotate-ccw').click(function() {
		$('#crop-modal-update .image-editor').cropit('rotateCCW');
	});

	$('#malfunction-popup-edit-image-update').on('change', function(){
		$('.setting-tools').show();
	});

	$('#crop-modal-update .save').click(function() {
		var imageData = $('#crop-modal-update .image-editor').cropit('export');

		//check data-pos before/after
		if($('#crop-modal-update .save').attr('data-pos') == 'before'){
			$('#malfunction-update-form .image-before-div .default-no-img-vehicle').css('background-image', 'url('+imageData+')');
			$('#malfunction-update-form #vehicle-malfunction-image-before').val(imageData);
		}else{
			$('#malfunction-update-form .image-after-div .default-no-img-vehicle').css('background-image', 'url('+imageData+')');
			$('#malfunction-update-form #vehicle-malfunction-image-after').val(imageData);
		}
		
		$('#malfunction-details-model').css('opacity', '1');
		// window.open(imageData);
	});

	$('#crop-modal-update').on('hidden.bs.modal', function () {
        $('#malfunction-details-model').css('opacity', '1');
    });

	$('#malfunction-details-model').on('hidden.bs.modal', function () {
        $('body').css('overflow-y', 'auto');
    });
</script>
<?php /**PATH C:\Projekti\Wine360\resources\views/malfunction/CropImageModal.blade.php ENDPATH**/ ?>