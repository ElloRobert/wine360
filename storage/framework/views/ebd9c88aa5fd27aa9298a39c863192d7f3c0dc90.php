

<?php $__env->startSection('body_class', 'body__home'); ?>

<?php $__env->startSection('content'); ?>

<div class="top-bar" style="background-color: white">
    <img class="logo" style="height: 50px; width:auto;" src="<?php echo e(asset('img/interface/logo.svg')); ?>" />
</div>
<div class="container login-form" >
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-back  mt-45" href="<?php echo e(url('/login')); ?>">
                        <div class="col-xs-2 col-sm-2">
                            <img class="logo" style="height: 25px; width:auto;" src="<?php echo e(asset('img/interface/arrow-left.svg')); ?>" />
                        </div>
                        <div class="col-xs-10 col-sm-10">
                            <?php echo e(trans('default.back')); ?>

                        </div>
                    </a>
                </div>
                
                <div class="panel-body ">
                    <form id="user-registration-form" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="row form-content">
                            <div class="col-xs-12 col-md-6 mt-45">
                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="name" class="">
                                        <?php echo e(trans('login.name')); ?>

                                    </label>
                                    <div class="">
                                        <input id="name" type="name" class="form-control1" name="name" value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email" class="">
                                        <?php echo e(trans('login.email')); ?>

                                    </label>
                                    <div class="">
                                        <input id="email" type="email" class="form-control1" name="email" value="<?php echo e(old('email')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="password" class="">
                                        <?php echo e(trans('login.password')); ?>

                                    </label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control1" name="password" value="<?php echo e(old('password')); ?>" >
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('oib') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="oib" class="">
                                        <?php echo e(trans('login.oib')); ?>

                                    </label>
                                    <div class="">
                                        <input id="oib" type="text" class="form-control1" name="oib" value="<?php echo e(old('oib')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('oib')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('oib')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            </div>
                            <div class="col-xs-12 col-md-6 mt-45">

                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="city" class="">
                                        <?php echo e(trans('login.city')); ?>

                                    </label>
                                    <div class="">
                                        <input id="city" type="text" class="form-control1" name="city" value="<?php echo e(old('city')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    <?php if($errors->has('city')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('city')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="address" class="">
                                        <?php echo e(trans('login.address')); ?>

                                    </label>
                                    <div class="">
                                        <input id="address" type="text" class="form-control1" name="address" value="<?php echo e(old('address')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('address')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('company') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="company" class="">
                                        <?php echo e(trans('login.company')); ?>

                                    </label>
                                    <div class="">
                                        <input id="company" type="text" class="form-control1" name="company" value="<?php echo e(old('company')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    <?php if($errors->has('company')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('company')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('company-oib') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-12">
                                    <label for="company-oib" class="">
                                        <?php echo e(trans('login.companyOib')); ?>

                                    </label>
                                    <div class="">
                                        <input id="company-oib" type="text" class="form-control1" name="company_oib" value="<?php echo e(old('company_oib')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10">
                                    <?php if($errors->has('company_oib')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('company_oib')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn gumb mt-15">
                                    <?php echo e(trans('login.singUpButton')); ?>

                                </button>
                            </div>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\wine360\resources\views/auth/register.blade.php ENDPATH**/ ?>