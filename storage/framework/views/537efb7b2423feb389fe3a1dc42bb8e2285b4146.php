

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('content'); ?>


<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
        <img class="logo" src="<?php echo e(asset('img/interface/logo.svg')); ?>" alt="Wine360 logo" />
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
       <div id="edit-application-name" class="col-xs-12">
        <div class="">
          <?php echo e(csrf_field()); ?>

          <div class="d-none">
            <?php if (Auth::check() && Auth::user()->hasRole('employee')): ?>
              <?php if(Auth::user()->legalEntityUser->configuration->applicationName != null): ?>
                <span>
                  <?php echo e(Auth::user()->legalEntityUser->configuration->applicationName); ?>

                </span>
              <?php endif; ?>
            <?php endif; ?>
            <?php if (Auth::check() && Auth::user()->hasRole('admin|legal|private')): ?>
              <div class="app-name-block">
                <span
                  <?php if($errors->has('headline_image')): ?> style="margin-top: 0; margin-bottom: 0;" <?php endif; ?> id="editAppName">
                  <?php echo e(Auth::user()->configuration->applicationName); ?>

                </span>
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 padding0">
                  <?php if($errors->has('headline_image')): ?>
                    <span class="help-block text-center">
                      <strong><?php echo e($errors->first('headline_image')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
        </div>
        </div>
      </div> 
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php if(empty(Auth::user()->image)): ?>
          <div class="user-image-circle">
            <form id="edit-user-image" action="<?php echo e(route('user.image.edit')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


              <label for="headline-user-image">
                <img src="<?php echo e(url('/img/interface/add-icon.svg')); ?>">
              </label>
              <input style="display: none;" id="headline-user-image" type="file" name="headline-user-image">
            </form>
          </div>

          <?php else: ?>
          <div style="background-image: url('<?php echo e(url('img/userImage')); ?>/<?php echo e(Auth::user()->image); ?>');" class="user-image-circle user-has-image">
          </div>
          <?php endif; ?>
          <div class="row" style="margin-top: 20px; margin-left:15px;">
            <div class="com-sm-12">
              <span>
                <?php echo e(Auth::user()->name); ?>

              </span>
            </div>
            <div class="com-sm-12">
              <span>
                <?php echo e(Auth::user()->roles->first()->name); ?>

              </span>
            </div>
          </div>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-top: 35px">
            <img src="<?php echo e(url('/img/interface/load-more-icon.svg')); ?>">
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="<?php echo e(route('user-settings.edit', [Auth::user()->id])); ?>"><?php echo e(trans('user.title')); ?></a>
            </li>
            <li>
              <a href="<?php echo e(route('configuration')); ?>" id="settings">
                <span><?php echo e(trans('default.settings')); ?></span>
              </a>
            </li>
            <li>
              <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(trans('default.logout')); ?></a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

              </form>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown mr-15">
           <a href="<?php echo e(route('reminders.index')); ?>" id="remindersZvonce">
            <img src="<?php echo e(asset('img/interface/zvonce.svg')); ?>" class="smanjena-slika" id="zvonce">
          </a> 
        </li>
        <li class="dropdown mr-25">
          <img src="<?php echo e(asset('img/interface/plus.svg')); ?>" class="smanjena-slika" id="plus">
          <ul class="padajuci-izbornik" id="padajuciIzbornik">
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(url('/users')); ?>" id="usersTabPlus" class="elementIzbornika">
                  <span>Korisnik</span>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="dashboard-content" class="row" style="margin-left:15px;">
  
  <div class="sidebar">
    <div class="hamburger">
      <div id="burger-container" class="open">
        <div id="burger">
       
          <img id="smanji" src="<?php echo e(asset('img/interface/smanji.svg')); ?>" style="width: 20px; height:auto;">
          <img id="povecaj" class="d-none" src="<?php echo e(asset('img/interface/povecaj.svg')); ?>" style="width: 20px; height:auto;">
        </div>
      </div>
    </div>
    <ul>
      <li class="mt-5" id="dashboardTab">
        <a href="<?php echo e(url('/home')); ?>" class="poravnajne" id="dashboard">
           <img src="<?php echo e(asset('img/interface/radnaPloca.svg')); ?>" class="smanjena-slika" id="dashboard">
          <span class="ml-15"><?php echo e(trans('default.dashboard')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="wineryTab">
        <a href="<?php echo e(route('winery.index')); ?>"  id="wineryTab">
          <i class="fa-regular fa-building  " style="color: #590C13; margin-left: 8px;" class="smanjena-slika"></i>
          <span class="ml-15"><?php echo e(trans('default.winery')); ?></span>
        </a>
      </li>
      <li class="mt-5 " id="winesTab">
        <a href="<?php echo e(route('wines.index')); ?>" id="wines">
          <i class="fa-solid fa-wine-bottle " style="color: #590C13; margin-left: 8px;" ></i>
          <span class="ml-15" ><?php echo e(trans('default.wines')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="messagesTab">
        <a href="<?php echo e(route('messages.index')); ?>" id="messages">
          <i class="fa-regular fa-envelope" style="color: #590C13; margin-left: 8px;" ></i>
          <span class="ml-15"><?php echo e(trans('default.messages')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="remindersTab">
        <a href="<?php echo e(route('reminders.index')); ?>" id="reminders">
          <i class="fa-regular fa-clock" style="color: #590C13; margin-left: 8px;"></i>
          <span class="ml-15"><?php echo e(trans('default.reminders')); ?></span>
        </a>
      </li>
      <li class="mt-5"  id="usersTab">
        <a href="<?php echo e(url('/users')); ?>" class="poravnajne" id="users">
          <i class="fa-solid fa-users" style="color: #590C13; margin-left: 8px;"></i>
          <span class="ml-15"><?php echo e(trans('default.users')); ?></span>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">
    <?php echo $__env->yieldContent('dashboard-content'); ?>
  </div>
    <?php echo $__env->make('reminder.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('users.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script>
  $(document).ready(function () {
    $("#plus").click(function () {
      $("#padajuciIzbornik").toggle();
    });

    // Zatvori padajući izbornik ako korisnik klikne izvan njega
    $(document).click(function (e) {
      if (!$(e.target).closest("#plus").length && !$(e.target).closest("#padajuciIzbornik").length) {
        $("#padajuciIzbornik").hide();
      }
    });

    $("#slikaI").click(function () {
      $("#ipadajuciIzbornik").toggle();
    });

    // Zatvori padajući izbornik ako korisnik klikne izvan njega
    $(document).click(function (e) {
      if (!$(e.target).closest("#slikaI").length && !$(e.target).closest("#ipadajuciIzbornik").length) {
        $("#ipadajuciIzbornik").hide();
      }
    });
    $('#usersTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addUserModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addUserModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#usersTabPlus').attr('href');
      });
    });

    $('#remindersZvonce').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addReminderModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addReminderModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#remindersZvonce').attr('href');
      });
    });

    $('.select2').select2();
});
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\wine360\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>