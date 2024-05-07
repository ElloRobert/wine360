

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('dashboard-content'); ?>
<style>
  .mt-25{
    margin-top:25px;
  }
  .mt-15{
    margin-top:15px;
  }
  .mt-45{
    margin-top:45px;
  }
  .dobrodosli{
    font-family: Poppins;
    font-size: 32px;
    font-weight: 400;
    line-height: 48px;
    letter-spacing: 0.1em;
    text-align: center;
    color: #717171;
  }
  .ime{
    font-family: Poppins;
    font-size: 32px;
    font-weight: 500;
    line-height: 32px;
    text-align: center;
    color: #323232;
  }
  .text1{
    font-family: Poppins;
    font-size: 18px;
    font-weight: 500;
    line-height: 21.6px;
    text-align: center;
    color: #323232;
  }
  .text2{
    font-family: Poppins;
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    text-align: center;
    color: #717171;
  }
  .blok {
    width: 100%; /* Promijenjeno */
    max-width: 580px; /* Dodano */
    height: 348px;
    padding: 40px 0px 0px 0px;
    gap: 16px;
    opacity: 1; /* Promijenjeno */
    background: #FFFFFF;
    border-radius: 30px;
}

.col-right-margin {
    margin-right: -55px;
    margin-left:40px/* Promijeni ovu vrijednost prema potrebi */
}
.col-left-margin{
    margin-right: -55px; /* Promijeni ovu vrijednost prema potrebi */
}

.blok .naslov{
  font-family: Poppins;
  font-size: 20px;
  font-weight: 500;
  line-height: 30px;
  text-align: center;
  color: #323232;
}

.blok .text{
  font-family: Poppins;
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  text-align: center;
  color: #717171;
  margin-left:40px;
  margin-right:40px;
  margin-top: 55px;
}
.btn-register{
        width: Fixed (208px);
        height: Hug (56px);
        padding: 16px 40px; 
        border-radius: 30px;
        gap: 16px;
        border: 1px solid #590C13;
        color: #590C13;
    }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12 "> <!-- Dodajemo dodatni div koji će grupirati h1 i h2 -->
      <div class="dobrodosli">DOBRODOŠLI</div>
      <div class="ime"><?php echo e($user->name); ?>!</div>
      <p class="text1 mt-25"><b>Dovršite ove korake i upravljajte vašom ponudom vina!</b></p>
      <p class="text-center mt-5">Lorem ipsum dolor sit amet consectetur. Nunc eget tempus pharetra quis egestas. Etiam amet consequat commodo libero.</p>
    </div>
  </div>
  <div class="row mt-45">
    <div class="col-md-6 col-right-margin">
        <div class="blok">
              <!-- Sadržaj prve kolone -->
              <div class="naslov">
                <img src="<?php echo e(asset('img/interface/kvacica.svg')); ?>" class="smanjena-slika">
                Aktivirajte besplatni probni period!
              </div>
              <div class="text">
                Lorem ipsum dolor sit amet consectetur. Nunc eget tempus pharetra quis egestas. Etiam amet consequat commodo libero.
              </div>
              <div class="text-center mt-45">
                  <a class="btn btn-register" href="#"> 
                    <?php echo e(trans('default.activate')); ?> 
                    <img src="<?php echo e(asset('img/interface/aktivirajIkona.svg')); ?>" class="smanjena-slika">
                  </a>
              </div>
        </div>
    </div>
    <div class="col-md-6 col-right-margin">
      <div class="blok">
            <!-- Sadržaj prve kolone -->
            <div class="naslov">
              <i class="fa-solid fa-wine-bottle " style="color: #590C13;" ></i>
              Dodajte novo vino!
            </div>
            <div class="text">
              Lorem ipsum dolor sit amet consectetur. Nunc eget tempus pharetra quis egestas. Etiam amet consequat commodo libero.
            </div>
            <div class="text-center mt-45">
                <a class="btn btn-register" href="#"> <?php echo e(trans('default.addWine')); ?> </a>
            </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\wine360\resources\views/home.blade.php ENDPATH**/ ?>