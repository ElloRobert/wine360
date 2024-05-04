

<div class="modal fade" id="addVehicleModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('vehiclesAdd.addDriver')); ?></h2>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <form method="POST" action="<?php echo e(route('vehiclesAdd.store')); ?>" enctype="multipart/form-data" >
                            <?php echo e(csrf_field()); ?>

                            <input class="form-control1 text-center" type="text" name="vehicle_id" id="vehicle_id" value="<?php echo e(old('id')); ?>" hidden/>
                            <div id="identifikacijskiPodaciInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles_name_license_plate"><?php echo e(trans('vehiclesAdd.vehicle')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="vehicles_name_license_plate" id="vehicles_name_license_plate" value="<?php echo e(old('vehicles_name_license_plate')); ?>" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_name_license_plate')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('vehicles_name_license_plate')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles_driver"><?php echo e(trans('vehicles.driver')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 text-right">
                                                <select name="vehicles_driver[]" class="form-control select2" id="vehicles_driver" multiple>
                                                    <option value="">-</option>
                                                    <?php $__currentLoopData = $user_list_driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value=<?php echo e($driver->id); ?>><?php echo e($driver->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal')): ?>
                                <div class="form-group row mt-15">
                                    <div class="col-xs-12 col-sm-12 text-center padding0 mt-mt-15">
                                        <button id="insertEditSubmitAction" class="btn gumb mt-15"><?php echo e(trans('default.save')); ?></button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
      $('.nav-pills .nav-item').on('click', function() {
        // Ukloni class 'active' s trenutno aktivnog elementa
        $('.nav-pills .nav-item .nav-link.active').removeClass('active');
        // Ukloni class 'active2' s trenutno aktivnog elementa
        $('.nav-pills .nav-item.active2').removeClass('active2');
        
        // Dodijeli class 'active' kliknutom elementu
        //$(this).addClass('active');
        // Dodijeli class 'active2' kliknutom elementu
        $(this).addClass('active2');

        $(this).find('.nav-link').addClass('active');
      });
    });

    $('#identifikacijskiPodaci').on('click', function() {
        $('#identifikacijskiPodaciInputi').removeClass('d-none');

        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#odrzavanje').on('click', function() {
        $('#odrzavanjeInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#status').on('click', function() {
        $('#statusInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#zivotniVijek').on('click', function() {
        $('#zivotniVijekInputi').removeClass('d-none');

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#nabavaInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#nabava').on('click', function() {
        $('#nabavaInputi').removeClass('d-none'); 

        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        $('#tehnickiPodaciInputi').addClass('d-none');
    });

    $('#tehnickiPodaci').on('click', function() {
        $('#tehnickiPodaciInputi').removeClass('d-none');

        $('#nabavaInputi').addClass('d-none'); 
        $('#identifikacijskiPodaciInputi').addClass('d-none');
        $('#odrzavanjeInputi').addClass('d-none');
        $('#statusInputi').addClass('d-none');
        $('#zivotniVijekInputi').addClass('d-none');
        
    });

  </script>
  
<?php /**PATH C:\Projekti\wine360\resources\views/vehiclesAdd/addModal.blade.php ENDPATH**/ ?>