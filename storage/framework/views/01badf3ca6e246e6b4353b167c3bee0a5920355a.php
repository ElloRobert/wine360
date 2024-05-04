

<?php $__env->startSection('body_class', 'body__home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container login-form">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 padding0">

            <div class="panel panel-default">
                <div class="panel-heading">
                    
                    <a class="default-button def-btn-back" href="<?php echo e(url('/login')); ?>"><?php echo e(trans('default.back')); ?></a>
                    
                    <div class="row logo-img">
                        <img class="logo" src="<?php echo e(asset('img/Wine360-logo.svg')); ?>" />
                    </div>
                    <div class="row border">
                        <img class="border-img" src="<?php echo e(asset('img/login/border-line.png')); ?>" />
                    </div>
                    <div class="row headline text-center">
                        <span><?php echo e(trans('login.singUpTitle')); ?></span>
                        <p style="font-size: 12px;margin-top: 15px;">Mobilna verzija aplikacije uskoro će biti dostupna.</p>
                    </div>
                </div>
                <div class="panel-body">

                    <form id="user-registration-form" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="row form-content">

                            <img id="registration-bg-image" class="login-bg-image" src="<?php echo e(asset('img/login/login-bg-img.svg')); ?>" data-src="<?php echo e(asset('img/login/registration-legaly-entity-bg-img.svg')); ?>" data-temp_src="<?php echo e(asset('img/login/login-bg-img.svg')); ?>" />


                            <div class="form-group registration-type">
                                <div class="col-xs-6 col-sm-6 padding0 text-left">
                                    <label for="reg-type-2" class="<?php echo e(old('reg_type')=='2' ? 'reg-active' : ''); ?> reg-type-2 login-label-icon col-xs-4 padding0 <?php if(Session::has('session_reg_type') && Session::get('session_reg_type') == 2 ): ?>
                                    reg-active
                                    <?php endif; ?>">
                                        <span><?php echo e(trans('login.user_legalEntity')); ?></span>
                                    </label>
                                    <input id="reg-type-2" type="radio" name="reg_type" value="2" <?php if(Session::has('session_reg_type') && Session::get('session_reg_type') == 2 ): ?>
                                    checked="checked"
                                    <?php endif; ?>
                                    />
                                </div>

                                <div class="col-xs-6 col-sm-6 padding0 text-right">
                                    <label for="reg-type-4" class="<?php echo e(old('reg_type')=='4' ? 'reg-active' : ''); ?> reg-type-4 login-label-icon col-xs-4 padding0 <?php if(Session::has('session_reg_type') && Session::get('session_reg_type') == 4 ): ?>
                                    reg-active
                                    <?php endif; ?> <?php if(!Session::has('session_reg_type')): ?> reg-active <?php endif; ?>">
                                        <span><?php echo e(trans('login.user_private')); ?></span>
                                    </label>
                                    <input id="reg-type-4" type="radio" name="reg_type" value="4" <?php if(Session::has('session_reg_type') && Session::get('session_reg_type') == 4 ): ?>
                                    checked="checked"
                                    <?php endif; ?>
                                    <?php if(!Session::has('session_reg_type')): ?> checked="checked" <?php endif; ?>
                                    />
                                </div>
                            </div>


                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="name" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/user-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="name" type="name" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(trans('login.name')); ?>" >
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
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="email" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/user-email-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('login.email')); ?>" >
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
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="password" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/password-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="password" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(trans('login.password')); ?>" >
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



                            
                            <div class="oib-form-group form-group-input-field form-group<?php echo e($errors->has('oib') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="oib" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/password-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="oib" type="text" class="form-control" name="oib" value="<?php echo e(old('oib')); ?>" placeholder="<?php echo e(trans('login.oib')); ?>" >
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



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="city" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/city-icon.png')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="city" type="text" class="form-control" name="city" value="<?php echo e(old('city')); ?>" placeholder="<?php echo e(trans('login.city')); ?>" >
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('city')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('city')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="form-group-input-field form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="address" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/user-address-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="address" type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('login.address')); ?>" >
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



                            
                            <div class="company-form-group form-group-input-field form-group<?php echo e($errors->has('company') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="company" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/user-company-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="company" type="text" class="form-control" name="company" value="<?php echo e(old('company')); ?>" placeholder="<?php echo e(trans('login.company')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('company')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('company')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                            
                            <div class="company-oib-form-group form-group-input-field form-group<?php echo e($errors->has('company-oib') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="company-oib" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/password-icon.svg')); ?>" />
                                    </label>
                                    <div class="col-xs-9 padding0">
                                        <input id="company-oib" type="text" class="form-control" name="company_oib" value="<?php echo e(old('company_oib')); ?>" placeholder="<?php echo e(trans('login.companyOib')); ?>">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <?php if($errors->has('company_oib')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('company_oib')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>



                        </div>


                        <div class="row form-submit">
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/auth/register.blade.php ENDPATH**/ ?>