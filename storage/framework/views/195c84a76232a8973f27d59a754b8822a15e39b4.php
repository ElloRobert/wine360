

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
                        <span><?php echo e(trans('login.passwordReset')); ?></span>
                    </div>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div style="position: relative;float: unset;z-index: 999;" class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <form id="reset-password-form" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="row form-content">

                            <img class="login-bg-image" src="<?php echo e(asset('img/login/login-bg-img.svg')); ?>" />


                            <div class="form-group-input-field form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <label for="email" class="login-label-icon col-xs-3 padding0">
                                        <img src="<?php echo e(asset('img/login/user-icon.svg')); ?>" />
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

                        </div>


                        <div class="row form-submit">
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn">
                                        <?php echo e(trans('login.sendResetPasswordLink')); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\wine360\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>