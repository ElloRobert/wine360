

<?php $__env->startSection('body_class', 'body__home'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .top-bar {
        width: 100%;
        height: 50px;
        background-color: #fff;
        display: flex;
        align-items: center; /* Centrira sadržaj vertikalno */
        justify-content: space-between; /* Stavlja prostor između loga i ruba top bara */
    }

    .top-bar img {
        height: 100%; /* Postavlja visinu slike na 100% visine top bara */
        max-width: 100%; /* Održava proporcije slike i sprječava prelazak širine top bara */
    }

    .container.login-form {
        margin-top: 40px;
    }
    .login-naslov{
        font-family: Poppins;
        font-size: 32px;
        font-weight: 600;
        line-height: 48px;
        letter-spacing: 0em;
        text-align: center;
    }
    .panel-body{
        width: Fixed(600px);
        height: Hug(618px);
        padding: 0px, 56px, 0px, 56px;
        gap: 40px;
        margin: auto;

    }
    .login-form{
        width: Fixed(992px);
        height:Hug(730px);
        top: 204px;
        left: 464px;
        padding: 56px, 80px, 56px, 80px;
        border-radius: 30px;
        gap: 40px;
        background-color: #fff;
        
    }

    .btn-submit{
        width: Fixed (208px);
        height: Hug (56px);
        padding: 16px 40px; /* Ispravljena sintaksa, uklonjen zarez između vrijednosti paddinga */
        border-radius: 30px;
        gap: 16px;
        background: linear-gradient(90.73deg, #18B7A0 0.22%, #16A1D8 172.57%);
        color: #fff; /* Dodano postavljanje boje teksta (pretpostavljamo bijeli tekst) */
    }

    .btn-register{
        width: Fixed (208px);
        height: Hug (56px);
        padding: 16px 40px; /* Ispravljena sintaksa, uklonjen zarez između vrijednosti paddinga */
        border-radius: 30px;
        gap: 16px;
       /* background: linear-gradient(90.73deg, #18B7A0 0.22%, #16A1D8 172.57%);*/
       /* background: #18B7A0;*/
        border: 1px solid #18B7A0;
        color: #18B7A0;
    }

    .mt30{
        margin-top: 15px;
    }


</style>

<div class="top-bar">
    <img class="logo" src="<?php echo e(asset('img/Wine360-logo-novi.png')); ?>" />
</div>

    
<div class="login-form container ">
    <div class="row">
        <div class="col-xs-12 col-sm-8  col-md-12  padding0 ">

            <div class="panel panel-default ">
                <div class="panel-heading">
                       <h1 class="login-naslov">Prijava</h1>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="row form-content">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 text-center">
                                <div class="form-group-input-field form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                        <input id="email" type="email" class="form-control1" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('login.email')); ?>" >
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
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                        <input id="password" type="password" class="form-control1" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(trans('login.password')); ?>" >
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <?php if($errors->has('password')): ?>
                                        <span class="help-block text-center">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <strong style="color: red"><?php echo e($errors->first('active')); ?></strong>
                                <div class="form-group control-inputs">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <div class="col-xs-12 col-sm-12 padding0 text-right">
                                            <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                                                <?php echo e(trans('login.forgotPassword')); ?>

                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 padding0">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember">
                                                    <span><?php echo e(trans('login.rememberLogin')); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn btn-submit">
                                        <?php echo e(trans('login.login')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group  text-center">
                            <div class="mt30">
                                <span> <?php echo e(trans('login.registerLinkTitle')); ?> </span>
                            </div>
                            <div class="mt30">
                                <a class="btn btn-register" href="<?php echo e(url('/register')); ?>"> <?php echo e(trans('login.registerLinkButton')); ?> </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#email').focus();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/auth/login.blade.php ENDPATH**/ ?>