

<div class="modal fade" id="addWineryModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('winery.add')); ?></h2>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <div class="card-header mt-15">
                            <ul class="nav nav-pills card-header-pills">
                              <li class="nav-item col liPoravnanje active2" style="width:49%">
                                <a class="nav-link active" href="#" id="podaciOVinariji">Podaci o vinariji</a>
                              </li>
                              <li class="nav-item col liPoravnanje" style="width:50%">
                                <a class="nav-link " href="#" id="podaciWebStranica">Podaci za web stranicu </a>
                              </li>
                            </ul>
                    </div>
                    <div class="card-body mt-15">
                      
                    </div>
                  </div>
                    <div class="row">
                        <form method="POST" action="<?php echo e(route('winery.store')); ?>" enctype="multipart/form-data" >
                            <?php echo e(csrf_field()); ?>

                            <input class="form-control1 text-center" type="text" name="configuration_id" id="configuration_id" value="<?php echo e(old('configuration_id')); ?>" hidden/>
                            <div id="podaciOVinarijiInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationName"><?php echo e(trans('winery.applicationName')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationName" id="winery-applicationName" value="<?php echo e(old('applicationName')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationName')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationName')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationAddress"><?php echo e(trans('winery.applicationAddress')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationAddress" id="winery-applicationAddress" value="<?php echo e(old('applicationAddress')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationAddress')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationAddress')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationCity"><?php echo e(trans('winery.applicationCity')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationCity" id="winery-applicationCity" value="<?php echo e(old('applicationCity')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationCity')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationCity')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationZip"><?php echo e(trans('winery.applicationZip')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationZip" id="winery-applicationZip" value="<?php echo e(old('applicationZip')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationZip')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationZip')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                  
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationCountry"><?php echo e(trans('winery.applicationCountry')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationCountry" id="winery-applicationCountry" value="<?php echo e(old('applicationCountry')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationCountry')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationCountry')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="applicationPhone"><?php echo e(trans('winery.applicationPhone')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="applicationPhone" id="winery-applicationPhone" value="<?php echo e(old('applicationPhone')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('applicationPhone')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('applicationPhone')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="emailForReports"><?php echo e(trans('winery.emailForReports')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="emailForReports" id="winery-emailForReports" value="<?php echo e(old('emailForReports')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('emailForReports')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('emailForReports')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="OIB"><?php echo e(trans('winery.OIB')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="OIB" id="winery-OIB" value="<?php echo e(old('OIB')); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('OIB')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('OIB')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div id="podaciWebStranicaInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="winery_description"><?php echo e(trans('winery.winery_description')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="winery_description" id="winery_description"><?php echo e(old('winery_description')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('winery_description')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('winery_description')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="innovations"><?php echo e(trans('winery.innovations')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="innovations" id="winery-innovations"><?php echo e(old('innovations')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('innovations')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('innovations')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="packaging"><?php echo e(trans('winery.packaging')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="packaging" id="winery-packaging"><?php echo e(old('packaging')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('packaging')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('packaging')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="wine_assortment"><?php echo e(trans('winery.wine_assortment')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="wine_assortment" id="winery-wine_assortment"><?php echo e(old('wine_assortment')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('wine_assortment')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('wine_assortment')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="awards"><?php echo e(trans('winery.awards')); ?></label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <textarea class="form-control1 text-center" name="awards" id="winery-awards"><?php echo e(old('awards')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('awards')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('awards')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
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

        $(this).addClass('active2');

        $(this).find('.nav-link').addClass('active');
      });

       // Provjeravamo ulogu korisnika
       var isEmployee = <?php echo e(auth()->user()->hasRole('employee') ? 'true' : 'false'); ?>;
        if (isEmployee) {
            // Dodjeljujemo disabled atribut svim inputima i selectima unutar određenih elemenata
            $('#addVehicleModal input, select').prop('disabled', true);
        }
    });

    $('#podaciOVinariji').on('click', function() {
        $('#podaciOVinarijiInputi').removeClass('d-none');
        $('#podaciWebStranicaInputi').addClass('d-none');
    });

    $('#podaciWebStranica').on('click', function() {
        $('#podaciWebStranicaInputi').removeClass('d-none');
        $('#podaciOVinarijiInputi').addClass('d-none');
       
    });
    $('.select2').select2();

  </script>
  
<?php /**PATH C:\Projekti\wine360\resources\views/winery/addModal.blade.php ENDPATH**/ ?>