<div class="modal" id="crop-modal">
  <div class="modal-dialog modal-lg">
      <div class="modal-content model-content">
          <div class="modal-header modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title model-title"><?php echo e(trans('malfunction.editImage')); ?></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="image-editor">
                      <label for="vehicle-image" class="default-button"><?php echo e(trans('malfunction.chooseImage')); ?></label>
                      <br/>
                      <br/>
                      <input style="display: none;" id="vehicle-image" class="cropit-image-input" type="file" name="vehicle_image_file">
                      <input id="vehicle-image-edited" type="hidden" name="vehicle_image">
                      <div class="cropit-preview"></div>
                      <div style="display: none;" class="setting-tools">
                          <div class="image-size-label"><?php echo e(trans('default.resize_image')); ?></div>
                          <input type="range" class="cropit-image-zoom-input">
                          <br/>
                          <div class="col-xs-9 padding0">
                              <a href="javascript:void(0)" class="rotate-ccw default-button"><?php echo e(trans('default.rotate_counterclockwise')); ?></a>
                              <a href="javascript:void(0)" class="rotate-cw default-button"><?php echo e(trans('default.rotate_clockwise')); ?></a>
                          </div>
                          <div class="col-xs-3 padding0 text-right">
                              <a href="javascript:void(0)"  class="save default-button close-crop-modal"><?php echo e(trans('default.save')); ?></a>
                              <a href="javascript:void(0)"  class="close-modal default-button close-crop-modal"><?php echo e(trans('default.close')); ?></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


<?php /**PATH C:\Projekti\Wine360\resources\views/vehicles/cropImageModal.blade.php ENDPATH**/ ?>