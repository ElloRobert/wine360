
<div class="modal fade" id="addUserModal"  role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel"><?php echo e(trans('users.add')); ?></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="user-registration-form" class="form-horizontal" role="form" method="POST" action="<?php echo e(route('registerEmployee')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input class="form-control1 text-center" type="text" name="user_id" id="user_id" value="<?php echo e(old('id')); ?>" hidden/>
                        <div id="identifikacijskiPodaciInputi" class="">
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="row">
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10">
                                            <label for="name">
                                                <?php echo e(trans('user.userName')); ?>

                                            </label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input id="name" type="name" class="form-control1" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(trans('login.name')); ?>" >
                                        </div>
                                    </div>
                                    <div class="marginTop">
                                        <div class="col-xs-10 col-sm-10 mt-15">
                                            <label for="email">
                                                <?php echo e(trans('user.userEmail')); ?>

                                            </label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10">
                                            <input id="email" type="email" class="form-control1" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('login.email')); ?>" >
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-6 padding0">
                                <div class="marginTop">
                                    <div class="col-xs-10 col-sm-10 " >
                                        <label for="address"><?php echo e(trans('user.userAddress')); ?></label>
                                    </div>
									<div class="col-xs-10 col-sm-10">
										<input id="address" type="text" class="form-control1" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('login.address')); ?>" >
									</div>
                                </div>
                                <div class="col-xs-10 col-sm-10 mt-15">
                                    <label for="password"><?php echo e(trans('user.userPassword')); ?></label>
                                </div>
                                <div class="col-xs-10 col-sm-10">
                                    <input data-character-set="a-z,A-Z,0-9,#" rel="gp" id="password" type="password" class="form-control1" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(trans('login.password')); ?>" style="width: 93%" >
                                    <a type="btn" id="showPassword"><img id="passwordIcon" src=<?php echo e(asset('img/interface/vidiLozinku.svg')); ?>></a>
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


    $('#showPassword').click(function() {
    var passwordInput = $('#password');
    var currentType = passwordInput.attr('type');
    var passwordIcon = $('#passwordIcon');
    
    if (currentType === 'password') {
        passwordInput.attr('type', 'text');
        passwordIcon.attr('src', '<?php echo e(asset('img/interface/sakriLozinku.svg')); ?>');
    } else {
        passwordInput.attr('type', 'password');
        passwordIcon.attr('src', '<?php echo e(asset('img/interface/vidiLozinku.svg')); ?>');
    }
});

  </script>
  
<?php /**PATH C:\Projekti\Wine360\resources\views/users/addModal.blade.php ENDPATH**/ ?>