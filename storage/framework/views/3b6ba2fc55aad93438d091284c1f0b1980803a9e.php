<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="img/logo.png" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
      integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style2.css')); ?>">
    <link rel="stylesheet" href="css/lightbox.css" />

    <title>WINE360 - Arhiva Vina</title>
  </head>
  <body>
    <!--Header-->
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top nav-menu">
        <a href="naslovna.html" class="navbar-brand text-light text-uppercase">
          <img src="<?php echo e(asset('img/interface/logo.svg')); ?>" alt="logo" />
        </a>
        <button
          class="navbar-toggler nav-button"
          type="button"
          data-toggle="collapse"
          data-target="#myNavbar"
        >
          <div class="bg-light line1"></div>
          <div class="bg-light line2"></div>
          <div class="bg-light line3"></div>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold"
          id="myNavbar"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/wines/archive" class="nav-link m-2 menu-item">
                Sva vina
              </a>
            </li>
            <li class="nav-item">
              <a href="/winery/archive" class="nav-link m-2 menu-item">
                Vinarije
              </a>
            </li>
            <li class="nav-item">
              <a href="naslovna.html" class="nav-link m-2 menu-item nav-active"
                >O aplikaciji</a
              >
            </li>
          </ul>
        </div>
      </nav>
      <!--Navbar end-->
      <!--Banner-->
      <div class="text-light text-md-right text-center banner">
        <h1 class="display-4 banner-heading">
          Dobrodošli na <span class="text-uppercase">Wine</span
          ><span class="display-3">360</span>
        </h1>
        <p class="lead banner-par">
          S Wine360, Vinarije Ulaze u Digitalnu Eru: Skeniraj, Otkrij, Uživaj!
        </p>
      </div>
      <!--Banner end-->
    </header>
    <!--Header end-->
    <!-- product grid -->
    <section class="recommended-products py-md-5 arhiva">
      <div class="container">
        <h2 class="text-center mb-5">Arhiva vina</h2>
        <ul class="list-inline text-center text-uppercase font-weight-bold my-4">
          <li class="list-inline-item gallery-list-item active-item" data-filter="sve">
            Sve <span class="mx-md-5 mx-3 text-muted">/</span>
          </li>
          <li class="list-inline-item">
            <form>
              <div class="form-group">
                <select class="form-control" id="sorteVina">
                  <option value="cabernetSauvignon" >Cabernet Sauvignon</option>
                  <option value="sauvignonBlanc" >Sauvignon Blanc</option>
                  <option value="merlot" >Merlot</option>
                  <option value="riesling" >Riesling</option>
                  <option value="chardonnay" >Chardonnay</option>
                </select>
              </div>
            </form>
          </li>
        </ul>
        <div class="row" id="vine">
          <?php $__currentLoopData = $wines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-sm-6 col-12 mb-4 filter cabernetSauvignon">
            <div class="card">
              <?php
                if(isset($wine->file_name_back)){
                  $frontImageUrl = asset('storage/' . $wine->file_name_back);   
                }else{
                  $frontImageUrl = asset('img/interface/vino.png');   
                }
              ?>
                <img src="<?php echo e($frontImageUrl); ?>" alt="Fotografija butelje">
              
              <div class="card-body">
                <h5 class="card-title"><?php echo e($wine->name); ?></h5>
                <p class="card-text"><?php echo e($wine->product_description); ?></p>
                <a href="/wines/product/<?php echo e($wine->id); ?>" class="btn btn-warning font-weight-bold">Pogledaj</a>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <!--recomended product grid end-->
    <!-- footer -->
    <footer class="py-5">
      <div class="container">
        <div class="row">
          <!-- Kontakt informacije -->
          <div class="col-lg-4">
            <h5>Kontakt informacije</h5>
            <p>
              Adresa: Ulica 123, Grad, Država<br />
              Telefon: +123 456 789<br />
              E-mail: info@wine360.com
            </p>
          </div>
          <!-- Newsletter forma -->
          <div class="col-lg-4">
            <h5>Prijavite se na newsletter</h5>
            <form action="#" method="post">
              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  id="newsletterEmail"
                  name="newsletterEmail"
                  placeholder="Unesite e-mail"
                  required
                />
              </div>
              <button
                type="submit"
                class="btn btn-warning btn-sm font-weight-bold"
              >
                Pretplati se
              </button>
            </form>
          </div>
          <!-- Citat za vino -->
          <div class="col-lg-4">
            <blockquote class="blockquote">
              <p class="mb-0">"Vino je umjetnost koja se pije."</p>
              <footer class="blockquote-footer">
                Nepoznati vinski ljubitelj
              </footer>
            </blockquote>
          </div>
        </div>
      </div>
    </footer>
    <!--footer end-->

    <script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
      integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
      integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
      crossorigin="anonymous"
    ></script>
    <script src="js/script.js"></script>
    <script src="js/lightbox.js"></script>
  </body>
</html>
<?php /**PATH C:\Projekti\wine360\resources\views/wine/archive.blade.php ENDPATH**/ ?>