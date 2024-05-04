

<div class="modal fade" id="addVehicleModal"  role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('suppliers.add')); ?></h2>
            </div>
            <div class="modal-body">
               
                <div class="row">
                    <form method="POST" action="<?php echo e(route('suppliers.store')); ?>" enctype="multipart/form-data" >
                        <?php echo e(csrf_field()); ?>

                        <input class="form-control1 text-center" type="text" name="supplier_id" id="supplier_id" value="<?php echo e(old('id')); ?>" hidden/>
                        <div id="identifikacijskiPodaciInputi" class="">
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label class="control-label" for="supplier-name"><?php echo e(trans('suppliers.name')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input class="form-control1 text-center" type="text" name="name" id="supplier_name" value="<?php echo e(old('supplier_name')); ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('name')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label class="control-label" for="supplier-oib"><?php echo e(trans('suppliers.oib')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input class="form-control1 text-center" type="text" name="oib" id="supplier_oib" value="<?php echo e(old('supplier_oib')); ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('oib')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('oib')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label class="control-label" for="supplier-address"><?php echo e(trans('suppliers.address')); ?></label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input class="form-control1 text-center" type="text" name="address" id="supplier_address" value="<?php echo e(old('supplier_address')); ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('address')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="supplier-city"><?php echo e(trans('suppliers.city')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1 text-center" type="text" name="city" id="supplier_city" value="<?php echo e(old('supplier_city')); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            <?php if($errors->has('city')): ?>
                                                <span class="help-block text-right">
                                                <strong><?php echo e($errors->first('city')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="supplier-email"><?php echo e(trans('suppliers.email')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1 text-center" type="email" name="email" id="supplier_email" value="<?php echo e(old('supplier_email')); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block text-right">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="supplier-phone-number"><?php echo e(trans('suppliers.phone_number')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1 text-center" type="text" name="phone_number" id="supplier_phone_number" value="<?php echo e(old('supplier_phone_number')); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-sm-10 padding0">
                                            <?php if($errors->has('phone_number')): ?>
                                                <span class="help-block text-right">
                                                <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (Auth::check() && Auth::user()->hasRole('admin|private|legal|employee')): ?>
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
  
<?php /**PATH C:\Projekti\Wine360\resources\views/suppliers/addModal.blade.php ENDPATH**/ ?>