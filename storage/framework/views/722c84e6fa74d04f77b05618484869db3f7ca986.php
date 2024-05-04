

<div class="modal fade" id="addVehicleModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('vehicles.addVehicle')); ?></h2>
            </div>
            <div class="modal-body">
               
                <div class="card text-center">
                    <div class="card-header mt-15">
                            <ul class="nav nav-pills card-header-pills">
                              <li class="nav-item col liPoravnanje active2">
                                <a class="nav-link active" href="#" id="identifikacijskiPodaci">Identifikacijski podaci</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link " href="#" id="odrzavanje">Održavanje</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link" href="#" id="status">Status</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link" href="#" id="zivotniVijek">Životni vijek</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link" href="#" id="nabava">Nabava</a>
                              </li>
                              <li class="nav-item col liPoravnanje">
                                <a class="nav-link" href="#" id="tehnickiPodaci">Tehnički podaci</a>
                              </li>
                            </ul>
                    </div>
                    <div class="card-body mt-15">
                      
                    </div>
                  </div>
                    <div class="row">
                        <form method="POST" action="<?php echo e(route('vehicles.store')); ?>" enctype="multipart/form-data" >
                            <?php echo e(csrf_field()); ?>

                            <input class="form-control1 text-center" type="text" name="vehicle_id" id="vehicle_id" value="<?php echo e(old('id')); ?>" hidden/>
                            <div id="identifikacijskiPodaciInputi" class="">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-chassis-number"><?php echo e(trans('vehicles.chassis_number')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="vehicles_chassis_number"   id="vehicles_chassis_number" value="<?php echo e(old('vehicles_chassis_number')); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_chassis_number')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('vehicles_chassis_number')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-name"><?php echo e(trans('vehicles.name')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="vehicles_name" id="vehicles_name" value="<?php echo e(old('vehicles_name')); ?>"/>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_name')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('vehicles_name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-category"><?php echo e(trans('vehicles.category')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control1 select2" name="vehicles_category" id="vehicles_category">
                                                        <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                        <?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value=<?php echo e($vehicle_category->id); ?> class="categoryOption"><?php echo e($vehicle_category->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-license-plate"><?php echo e(trans('vehicles.license_plate')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="vehicles_license_plate" id="vehicles_license_plate" value="<?php echo e(old('vehicles_license_plate')); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_license_plate')): ?>
                                                    <span class="help-block text-right">
                                                    <strong><?php echo e($errors->first('vehicles_license_plate')); ?></strong>
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
                                                <label class="control-label" for="vehicles-year"><?php echo e(trans('vehicles.year')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="text" name="vehicles_year" id="vehicles_year" value="<?php echo e(old('vehicles_year')); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_year')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('vehicles_year')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-mark"><?php echo e(trans('vehicles.mark')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 text-right">
                                                <select name="vehicles_mark" class="form-control select2" id="vehicles_mark">
                                                    <option value="">-</option>
                                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value=<?php echo e($brand->id); ?>><?php echo e($brand->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-model"><?php echo e(trans('vehicles.model')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select name="vehicles_model" class="form-control select2" id="vehicle_model">
                                                    <?php if(old('vehicles_mark')): ?>
                                                        <!-- Ako je marka odabrana, popuni opcije modela -->
                                                    
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-10 padding0">
                                                <?php if($errors->has('vehicles_model')): ?>
                                                    <span class="help-block text-right">
                                                        <strong><?php echo e($errors->first('vehicles_model')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="odrzavanjeInputi" class="d-none">
                             
                                <div class="row">
                                    <div class="col-sm-4">
                                           <h4><strong>Molim vas odaberite željena održavanja:</strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="checkbox" name="odrzavanje[]" value="mali_servis">
                                            Mali servis
                                        </label><br>
                                        
                                        <label>
                                            <input type="checkbox" name="odrzavanje[]" value="veliki_servis">
                                            Veliki servis
                                        </label><br>
                                        
                                        <label>
                                            <input type="checkbox" name="odrzavanje[]" value="gume">
                                            Gume
                                        </label><br>
                                        
                                        <label>
                                            <input type="checkbox" name="odrzavanje[]" value="pranje_stakala">
                                            Tekućina za pranje stakala
                                        </label><br>
                                        
                                        <label>
                                            <input type="checkbox" name="odrzavanje[]" value="registracija">
                                            Registracija
                                        </label><br>
                                    </div>
                                </div>
                            </div>
                            <div id="statusInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-status"><?php echo e(trans('vehicles.status')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control select2" name="vehicles_status" id="vehicles_status">
                                                        <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                        <?php $__currentLoopData = $VehicleStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VehicleStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value=<?php echo e($VehicleStatus->id); ?>><?php echo e($VehicleStatus->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="vehicles-property"><?php echo e(trans('vehicles.property')); ?></label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <select class="form-control select2" name="vehicles_property" id="vehicles_property">
                                                        <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                        <?php $__currentLoopData = $VehicleProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VehicleProperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value=<?php echo e($VehicleProperty->id); ?>><?php echo e($VehicleProperty->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="control-label" for="vehicleGroup"><?php echo e(trans('vehicles.vehicleGroup')); ?></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12" style="width:80%">
                                                <select name="vehicleGroup" class="form-control" id="vehicleGroup">
                                                <?php $__currentLoopData = $vehicleGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value=<?php echo e($vehicleGroup->id); ?> <?php if(Auth::user()->configuration->vehicle_group_id == $vehicleGroup->id): ?> selected <?php endif; ?> ><?php echo e($vehicleGroup->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="vehicleGroupSubcategory marginTop">
                                            <div class="col-xs-12 col-sm-12">
                                                <label class="control-label" for="vehicleGroupSubcategory"><?php echo e(trans('vehicles.subcategory')); ?></label>
                                            </div>
                                            <div id="subcategoryContainer" class="col-xs-12 col-sm-12" style="width:80%">
                                                    <!-- Ovdje se prikazuju subkategorije -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="zivotniVijekInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="date_start"><?php echo e(trans('vehicles.start_date')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="date" name="date_start" id="date_start" value="<?php echo e(old('start_date')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="km_start"><?php echo e(trans('vehicles.initial_mileage')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="km_start" id="km_start" value="<?php echo e(old('initial_mileage')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="life_expectancy"><?php echo e(trans('vehicles.estimated_lifespan_months')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="life_expectancy" id="life_expectancy" value="<?php echo e(old('estimated_lifespan_months')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="km_expectancy"><?php echo e(trans('vehicles.estimated_mileage')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="km_expectancy" id="km_expectancy" value="<?php echo e(old('estimated_mileage')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="value_expectancy"><?php echo e(trans('vehicles.resale_value')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="value_expectancy" id="value_expectancy" value="<?php echo e(old('resale_value')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="end_date"><?php echo e(trans('vehicles.deactivation_date')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="date" name="end_date" id="end_date" value="<?php echo e(old('deactivation_date')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="end_km_status"><?php echo e(trans('vehicles.mileage_at_deactivation')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="end_km_status" id="end_km_status" value="<?php echo e(old('mileage_at_deactivation')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div id="nabavaInputi" class="d-none">
                                <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="supplier_id"><?php echo e(trans('vehicles.supplier_name')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <select class="form-control select2" name="supplier_id" id="supplier_id">
                                        <!-- Popunite opcije dobavljača prema vašim potrebama -->
                                        <option value="">- <?php echo e(trans('default.choose')); ?> -</option>
                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="purchase_date"><?php echo e(trans('vehicles.purchase_date')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="date" name="purchase_date" id="purchase_date" value="<?php echo e(old('purchase_date')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="mileage_at_purchase"><?php echo e(trans('vehicles.mileage_at_purchase')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="mileage_at_purchase" id="mileage_at_purchase" value="<?php echo e(old('mileage_at_purchase')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="warranty_expiry_date"><?php echo e(trans('vehicles.warranty_expiry_date')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="date" name="warranty_expiry_date" id="warranty_expiry_date" value="<?php echo e(old('warranty_expiry_date')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="max_mileage_warranty"><?php echo e(trans('vehicles.max_mileage_warranty')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="max_mileage_warranty" id="max_mileage_warranty" value="<?php echo e(old('max_mileage_warranty')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="vehicleProcurement"><?php echo e(trans('vehicles.financing_type')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <select class="form-control select2" name="vehicleProcurement" id="vehicleProcurement">
                                        <!-- Popunite opcije vrste financiranja prema vašim potrebama -->
                                        <option value="">- <?php echo e(trans('default.choose')); ?> -</option>
                                            <?php $__currentLoopData = $vehicleProcurements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleProcurement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($vehicleProcurement->id); ?> <?php if(Auth::user()->configuration->vehicle_group_id == $vehicleProcurement->id): ?> selected <?php endif; ?> ><?php echo e($vehicleProcurement->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10">
                                        <label class="control-label" for="purchase_price_eur"><?php echo e(trans('vehicles.purchase_price_eur')); ?></label>
                                    </div>
                                    <div class="col-xs-10 col-sm-10">
                                        <input class="form-control1" type="number" name="purchase_price_eur" id="purchase_price_eur" value="<?php echo e(old('purchase_price_eur')); ?>"/>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>                          
                            <div id="tehnickiPodaciInputi" class="d-none">
                                <div class="container">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section1Heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#section1Collapse" aria-expanded="true" aria-controls="section1Collapse">
                                            Kapacitet vozila
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="section1Collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="section1Heading">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="number_of_people"><?php echo e(trans('vehicles.number_of_people')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="number_of_people" id="number_of_people" value="<?php echo e(old('number_of_people')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="length"><?php echo e(trans('vehicles.length')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="length" id="length" value="<?php echo e(old('length')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="height"><?php echo e(trans('vehicles.height')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="height" id="height" value="<?php echo e(old('height')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="width"><?php echo e(trans('vehicles.width')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="width" id="width" value="<?php echo e(old('width')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="trunk_capacity"><?php echo e(trans('vehicles.trunk_capacity')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="trunk_capacity" id="trunk_capacity" value="<?php echo e(old('trunk_capacity')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="cargo_space"><?php echo e(trans('vehicles.cargo_space')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="cargo_space" id="cargo_space" value="<?php echo e(old('cargo_space')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="payload_capacity"><?php echo e(trans('vehicles.payload_capacity')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="payload_capacity" id="payload_capacity" value="<?php echo e(old('payload_capacity')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section2Heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#section2Collapse" aria-expanded="false" aria-controls="section2Collapse">
                                            Gorivo i ulje
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="section2Collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="section2Heading">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="vehicles_fuel_type"><?php echo e(trans('vehicles.fuel_type')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <select class="form-control select2" name="vehicles_fuel_type" id="vehicles_fuel_type">
                                                                <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                                <?php $__currentLoopData = $fuel_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e(old('vehicles_fuel_type') == $type->id ? 'selected' : ''); ?> value="<?php echo e($type->id); ?>"><?php echo e(trans($type->name)); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="oil_class"><?php echo e(trans('vehicles.oil_class')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="text" name="oil_class" id="oil_class" value="<?php echo e(old('oil_class')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="fuel_tank_capacity"><?php echo e(trans('vehicles.fuel_tank_capacity')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="fuel_tank_capacity" id="fuel_tank_capacity" value="<?php echo e(old('fuel_tank_capacity')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="oil_tank_capacity"><?php echo e(trans('vehicles.oil_tank_capacity')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="oil_tank_capacity" id="oil_tank_capacity" value="<?php echo e(old('oil_tank_capacity')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section3Heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#section3Collapse" aria-expanded="false" aria-controls="section3Collapse">
                                            Pogon i prijenos
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="section3Collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="section3Heading">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="drive_type"><?php echo e(trans('vehicles.drive_type')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <select class="form-control select2" name="drive_type" id="drive_type">
                                                                <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                                <?php $__currentLoopData = $drive_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($drive_type->id); ?>"><?php echo e($drive_type->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="wheelbase"><?php echo e(trans('vehicles.wheelbase')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="wheelbase" id="wheelbase" value="<?php echo e(old('wheelbase')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="transmission_type"><?php echo e(trans('vehicles.transmission_type')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <select class="form-control select2" name="transmission_type" id="transmission_type">
                                                                <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                                <?php $__currentLoopData = $transmission_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transmission_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($transmission_type->id); ?>"><?php echo e($transmission_type->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section3Heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#section4Collapse" aria-expanded="false" aria-controls="section4Collapse">
                                                Gume
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="section4Collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="section3Heading">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="front_tire_dimensions"><?php echo e(trans('vehicles.front_tire_dimensions')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="text" name="front_tire_dimensions" id="front_tire_dimensions" value="<?php echo e(old('front_tire_dimensions')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="front_tire_type"><?php echo e(trans('vehicles.front_tire_type')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <select class="form-control select2" name="front_tire_type" id="front_tire_type">
                                                                <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                                <?php $__currentLoopData = $tierTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tierType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($tierType->id); ?>"><?php echo e($tierType->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="front_tire_pressure"><?php echo e(trans('vehicles.front_tire_pressure')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="front_tire_pressure" id="front_tire_pressure" value="<?php echo e(old('front_tire_pressure')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-xs-12 col-sm-6 padding0">
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="rear_tire_dimensions"><?php echo e(trans('vehicles.rear_tire_dimensions')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="text" name="rear_tire_dimensions" id="rear_tire_dimensions" value="<?php echo e(old('rear_tire_dimensions')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="rear_tire_type"><?php echo e(trans('vehicles.rear_tire_type')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <select class="form-control select2" name="rear_tire_type" id="rear_tire_type">
                                                                <option value=""><?php echo e(trans('default.choose')); ?></option>
                                                                <?php $__currentLoopData = $tierTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tierType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($tierType->id); ?>"><?php echo e($tierType->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="marginTop">
                                                        <div class="col-xs-10 col-sm-10">
                                                            <label class="control-label" for="rear_tire_pressure"><?php echo e(trans('vehicles.rear_tire_pressure')); ?></label>
                                                        </div>
                                                        <div class="col-xs-10 col-sm-10">
                                                            <input class="form-control1 text-center" type="number" name="rear_tire_pressure" id="rear_tire_pressure" value="<?php echo e(old('rear_tire_pressure')); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
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

    $('.select2').select2();

  </script>
  
<?php /**PATH C:\Projekti\Wine360\resources\views/vehicles/addModal.blade.php ENDPATH**/ ?>