

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
        <img class="logo" src="<?php echo e(asset('img/Wine360-logo-novi.png')); ?>" alt="Wine360 logo" />
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
        <li class="dropdown mr-15">
          <img src="<?php echo e(asset('img/interface/slikaI.svg')); ?>" class="smanjena-slika" id="slikaI">
          <ul class="padajuci-izbornik" id="ipadajuciIzbornik">
            <li class="iElementiIzbornika">
              <div>
                <a href="https://www.ofir.hr/" id="fuel" class="elementIzbornika">
                  <span>Korisnički centar</span>
                </a>
              </div>
            </li>
            <li class="iElementiIzbornika">
              <div>
                <a href="https://www.ofir.hr/" id="fuel" class="elementIzbornika">
                  <span>Online trening</span>
                </a>
              </div>
            </li>
            <li class="iElementiIzbornika">
              <div>
                <a href="https://www.ofir.hr/" id="fuel" class="elementIzbornika">
                  <span>Kontaktiraj podršku</span>
                </a>
              </div>
            </li>
            <li class="iElementiIzbornika">
              <div>
                <a href="https://www.ofir.hr/" id="fuel" class="elementIzbornika">
                  <span>Feedback</span>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown mr-25">
          <img src="<?php echo e(asset('img/interface/plus.svg')); ?>" class="smanjena-slika" id="plus">
          <ul class="padajuci-izbornik" id="padajuciIzbornik">
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(route('vehicles.maintenance')); ?>" id="maintenanceTabPlus" class="elementIzbornika">
                  <span>Servisi</span>
                </a>
              </div>
            </li>
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(route('vehicles.fuel')); ?>" id="fuelTabPlus" class="elementIzbornika">
                  <span><?php echo e(trans('default.fuel')); ?></span>
                </a>
              </div>
            </li>
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(route('vehicles.damage')); ?>" id="damageTabPlus" class="elementIzbornika">
                  <span>Šteta</span>
                </a>
              </div>
            </li>
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(route('costs.index')); ?>" id="costTabPlus" class="elementIzbornika">
                  <span>Trošak</span>
                </a>
              </div>
            </li>
            <li class="plusElementiIzbornika">
              <div>
                <a href="<?php echo e(route('workOrder.index')); ?>" id="workOrderTabPlus" class="elementIzbornika">
                  <span>Nalog</span>
                </a>
              </div>
            </li>
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
          <span class="ml-15" style="vertical-align: middle;"><?php echo e(trans('default.dashboard')); ?></span>
        </a>
      </li>
      <li class="mt-5">
        <a href="<?php echo e(route('vehicles.index')); ?>" class="poravnajne" id="vehiclesTab">
          <img src="<?php echo e(asset('img/interface/vozila.svg')); ?>" class="smanjena-slika">
          <span class="ml-15"><?php echo e(trans('default.vehicles')); ?></span>
        </a>
      </li>
        <div class="ml-30 d-none" id="subTabsVehicles">
            <li class="mt-5 " id="vehiclesListTab">
                <a href="<?php echo e(route('vehicles.index')); ?>" class="poravnajne" id="vehiclesList">
                  <img src="<?php echo e(asset('img/interface/lista.svg')); ?>" class="smanjena-slika">
                  <span class="ml-15"><?php echo e(trans('default.vehiclesList')); ?></span>
                </a>
            </li>
            <li class="mt-5" id="vehicleAllocationTab">
              <a href="<?php echo e(route('vehiclesAdd.index')); ?>" class="poravnajne" id="vehicleAllocation">
                <img src="<?php echo e(asset('img/interface/preuzimanja.svg')); ?>" class="smanjena-slika">
                <span class="ml-15"><?php echo e(trans('default.vehicleAllocation')); ?></span>
              </a>
            </li>
            <li class="mt-5">
              <a href="<?php echo e(route('costs.index')); ?>" class="poravnajne" id="costHistory">
                <img src="<?php echo e(asset('img/interface/povijestTroskova.svg')); ?>" class="smanjena-slika">
                <span class="ml-15"><?php echo e(trans('default.costHistory')); ?></span>
              </a>
            </li>
            <li class="mt-5" id="kilometerHistoryTab">
              <a href="<?php echo e(route('kilometers.index')); ?>" class="poravnajne" id="kilometerHistory">
                <img src="<?php echo e(asset('img/interface/povijestKilometara.svg')); ?>" class="smanjena-slika">
                <span class="ml-15"><?php echo e(trans('default.kilometerHistory')); ?></span>
              </a>
            </li>
            <li class="mt-5 d-none" id="lifetimeTab">
              <a href="<?php echo e(route('costs.index')); ?>" class="poravnajne" id="lifetime">
                <img src="<?php echo e(asset('img/interface/zivotniVijek.svg')); ?>" class="smanjena-slika">
                <span class="ml-15"><?php echo e(trans('default.lifetime')); ?></span>
              </a>
            </li>
        </div>
      </li>
      <li class="mt-5" id="incidentsTab">
        <a href="" id="incidents">
          <img src="<?php echo e(asset('img/interface/incidenti.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.incidents')); ?></span>
        </a>  
      </li>
      <div class="ml-30 d-none" id="subTabsIncidents">
        <li class="mt-5" id="malfunctionTab">
          <a href="<?php echo e(route('vehicles.malfunction')); ?>" id="malfunction">
            <img src="<?php echo e(asset('img/interface/kvarovi.svg')); ?>" class="smanjena-slika">
            <span><?php echo e(trans('default.malfunction')); ?></span>
          </a>
        </li>
        <li class="mt-5" id="damageTab">
          <a href="<?php echo e(route('vehicles.damage')); ?>" id="damage">
            <img src="<?php echo e(asset('img/interface/stete.svg')); ?>" class="smanjena-slika">
            <span><?php echo e(trans('default.damage')); ?></span>
          </a>
        </li>
      </div>
      <li class="mt-5" id="maintenanceTab">
        <a href="<?php echo e(route('vehicles.maintenance')); ?>" id="maintenance">
          <img src="<?php echo e(asset('img/interface/servisi.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.maintenance')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="remindersTab">
        <a href="<?php echo e(route('reminders.index')); ?>" id="reminders">
          <img src="<?php echo e(asset('img/interface/reminders.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.reminders')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="workOrderTab">
        <a href="<?php echo e(route('workOrder.index')); ?>" id="workOrder">
          <img src="<?php echo e(asset('img/interface/workOrder.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.workOrder')); ?></span>
        </a>
      </li>
      <li class="mt-5"  id="usersTab">
        <a href="<?php echo e(url('/users')); ?>" class="poravnajne" id="users">
          <img src="<?php echo e(asset('img/interface/korisnici.svg')); ?>" class="smanjena-slika">
          <span class="ml-15"><?php echo e(trans('default.users')); ?></span>
        </a>
      </li>
      <li class="mt-5 d-none">
        <a href="<?php echo e(route('vehicles.fuel')); ?>">
          <img src="<?php echo e(asset('img/interface/izvjestaji.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.fuel')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="suppliersTab">
        <a href="<?php echo e(route('suppliers.index')); ?>" id="suppliers">
          <img src="<?php echo e(asset('img/interface/suppliers.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.suppliers')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="fuelTab">
        <a href="<?php echo e(route('vehicles.fuel')); ?>" id="fuel">
          <img src="<?php echo e(asset('img/interface/goriva.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.fuel')); ?></span>
        </a>
      </li>
      <li class="mt-5" id="reportsTab">
        <a href="<?php echo e(route('reports.index')); ?>" id="reports">
          <img src="<?php echo e(asset('img/interface/izvjestaji.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.reports')); ?></span>
        </a>
      </li>
      <li class="mt-5 d-none">
        <a href="<?php echo e(route('configuration')); ?>" id="settings">
          <img src="<?php echo e(asset('img/interface/postavke-icon.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.settings')); ?></span>
        </a>
      </li>
      <li class="mt-5 d-none">
        <a href="<?php echo e(route('cleanings.index')); ?>" id="cleaning">
          <img src="<?php echo e(asset('img/interface/postavke-icon.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.cleaning')); ?></span>
        </a>
      </li>
      <li class="mt-5 d-none">
        <a href="<?php echo e(route('parkings')); ?>" id="parkingResources">
          <img src="<?php echo e(asset('img/interface/postavke-icon.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.parkingResources')); ?></span>
        </a>
      </li>
      <li class="mt-5 d-none">
        <a href="<?php echo e(route('chargers')); ?>" id="chargers">
          <img src="<?php echo e(asset('img/interface/postavke-icon.svg')); ?>" class="smanjena-slika">
          <span><?php echo e(trans('default.chargers')); ?></span>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">
    <?php echo $__env->yieldContent('dashboard-content'); ?>
  </div>
    <?php echo $__env->make('maintenance.addMaintenanceModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('damage.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('fuel.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('costs.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('users.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('reminder.addModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

    $('#damageTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addDamageModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addDamageModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#damageTabPlus').attr('href');
      });
    });

    $('#maintenanceTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addMaintenanceModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addMaintenanceModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#maintenanceTabPlus').attr('href');
      });
    });

    $('#fuelTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addFuelModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addFuelModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#fuelTabPlus').attr('href');
      });
    });

    $('#costTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addCostModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addCostModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#costTabPlus').attr('href');
      });
    });

    $('#costTabPlus').click(function(e){
      // Spriječavamo podrazumijevano ponašanje linka
      e.preventDefault();
      
      // Otvaramo modal
      $('#addCostModal').modal('show');

      // Čekamo da se modal zatvori prije preusmjeravanja
      $('#addCostModal').on('hidden.bs.modal', function (e) {
        // Preusmjeravamo na željenu rutu
        window.location.href = $('#costTabPlus').attr('href');
      });
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>