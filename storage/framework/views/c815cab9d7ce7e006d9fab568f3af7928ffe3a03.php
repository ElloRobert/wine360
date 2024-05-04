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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/lightbox.css" />
    <style>
        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            }
            body {
            font-family: "Montserrat", sans-serif;
            overflow-x: hidden;
            }

            /*header*/

            header {
            height: 13vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)),
                url(../img/naslovna1.jpg) no-repeat center center / cover;
            }

            /*navbar*/
            .nav-menu {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
            transition: all 0.7s;
            }

            .menu-item {
            font-size: 13px;
            letter-spacing: 1px;
            color: #eee;
            transition: color 0.5s;
            }

            .menu-item:hover {
            color: #ffd700;
            }

            .nav-active {
            color: #ffd700;
            }

            .navbar img {
            height: 75px;
            width: auto;
            margin-left: 30%;
            }

            .line1,
            .line2,
            .line3 {
            width: 23px;
            height: 3px;
            margin: 5px;
            transition: all 0.4s;
            }

            .change .line1 {
            transform: rotate(-45deg) translate(-5px, 6px);
            }
            .change .line3 {
            transform: rotate(45deg) translate(-5px, -6px);
            }
            .change .line2 {
            opacity: 0;
            }

            .custom-navbar {
            padding: 5px 30px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7));
            }

            /*navbar end*/

            /*banner*/
            .banner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            }

            .banner-heading {
            animation-name: anim;
            animation-duration: 2s;
            }

            .banner-par {
            animation-name: anim;
            animation-duration: 2s;
            animation-delay: 0.5s;
            animation-fill-mode: backwards;
            }

            @keyframes  anim {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
            }
            /*banner end*/

            /*header end*/

            /*about*/
            /*mission*/
            .about {
            background: #40162c;
            }

            .underline {
            width: 150px;
            border: 3px solid #eee;
            margin: auto;
            }

            /*mission end*/
            /*about end*/

            /*reference*/
            .underline2 {
            width: 150px;
            border: 3px solid #40162c;
            margin: auto;
            }

            .gallery-img {
            max-height: 150px;
            width: auto;
            transition: all 0.5s;
            backface-visibility: hidden;
            }
            .gallery-img:hover {
            transform: scale(1.05);
            }

            .first-row {
            transform: translateX(-300px);
            opacity: 0;
            transition: all 2.5s;
            }
            .second-row {
            transform: translateX(300px);
            opacity: 0;
            transition: all 2.5s;
            }

            .change .first-row,
            .change .second-row {
            transform: translateX(0);
            opacity: 1;
            }

            /*reference end*/

            /*customers*/
            .customers {
            background: #40162c;
            }

            .customers img {
            height: 125px;
            width: 125px;
            }

            /*customers end*/

            /*pricing*/

            .pricing img {
            height: 125px;
            width: 125px;
            }

            .pricing h2 {
            font-size: 1.5em;
            }

            #pricing .underline {
            border-color: #40162c;
            }

            /*pricing end*/
            /* contact */
            .contact {
            padding: 80px 0;
            background-color: #40162c;
            color: #fff;
            min-height: 100vh;
            }

            iframe {
            height: 100%;
            }

            /* Stilovi za formu */
            .form-group {
            margin-bottom: 20px;
            }

            .form-control {
            background-color: #fff;
            color: #40162c;
            width: 85%;
            }

            .btn-warning {
            background-color: #ffd700;
            color: #40162c;
            border: none;
            }

            .btn-warning:hover {
            background-color: #40162c;
            color: #fff;
            }

            /* Stilovi za desnu stranu sa slikom (logo) i citatom */
            .text-center {
            text-align: center;
            }

            .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            }

            .blockquote {
            margin-top: 20px;
            }
            /*contact end*/

            /*footer */
            footer {
            padding: 30px 0;
            background-color: #40162c;
            color: #fff;
            }

            footer h5 {
            color: #ffd700;
            }

            footer p,
            footer blockquote {
            color: #eee;
            }

            form {
            margin-top: 15px;
            }

            .btn-sm {
            font-size: 0.9rem;
            padding: 0.3rem 0.75rem;
            }

            /* STIL ZA SINGLE.HTML*/

            /*product-details*/
            .product-details {
            padding: 80px 0;
            background-color: #fff;
            color: #40162c;
            }

            .product-details img {
            max-width: 100%;
            max-height: 80vh;
            }

            /*description and meal description*/
            .product-details h2 {
            color: #40162c;
            font-size: 2em;
            }

            .product-details p {
            font-size: 1.1em;
            }

            /* recomended products */
            .recommended-products h2 {
            color: #40162c;
            font-size: 2.5em;
            margin-bottom: 50px;
            }

            .card {
            border: 1px solid #eee;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            }

            .card:hover {
            transform: scale(1.05);
            }

            .card-body {
            text-align: center;
            }

            .card-title {
            font-size: 1.5em;
            }

            .card-text {
            font-size: 1.1em;
            }

            .card img {
            max-height: 200px;
            width: 100%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            }

            /*explore*/

            .explore-winery {
            position: relative;
            }

            .explore-overlay {
            position: relative;
            overflow: hidden;
            }

            .explore-overlay img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
            }

            .img-fluid {
            border-radius: 0;
            }

            .explore-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            }

            .explore-text h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            }

            .btn-explore {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #ffc107; /* Boja gumba */
            border: 2px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            }

            .btn-explore:hover {
            background-color: #333; /* Boja gumba na hover */
            }

            /*blog*/
            .posts {
            background-color: #f8f9fa;
            }

            .post-img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            }

            .posts .section-heading,
            .posts .underline {
            color: #40162c;
            }

            .posts .card {
            transition: transform 0.3s ease-in-out;
            }

            .posts .card:hover {
            transform: scale(1.05);
            }

            /*blog end*/

            /*vinarije-korisnici*/
            .korisnici-gallery img {
            width: 250px;
            height: auto;
            margin: 20px;
            }

            .gallery-list-item {
            color: #777;
            cursor: pointer;
            user-select: none;
            }

            .active-item {
            color: #40162c;
            }
            /*vinarije-korisnici end*/

            /*RESPONSIVE*/
            @media (max-width: 990px) {
            .form-control {
                width: 100%;
            }
            }
            @media (max-width: 767px) {
            .navbar img {
                margin-left: 0px;
                padding: 10px;
            }
            .contact {
                padding: 60px 0;
            }
            .col-lg-6 {
                margin-bottom: 40px;
            }
            footer {
                text-align: center;
            }
            footer .col-md-6 {
                margin-bottom: 30px;
            }
            .recommended-products .card {
                margin-bottom: 30px;
            }
            .korisnici-gallery img {
                width: 150px;
            }
            }

            @media  screen and (max-width: 550px) {
            #korisnici-vinarije span {
                display: none;
            }
            #korisnici-vinarije li {
                text-align: center;
                display: block;
            }
            }
            @media  screen and (max-width: 400px) {
            .banner {
                position: relative;
            }
            .section-heading {
                font-size: 2.5rem;
            }
            }
    </style>
    <style>
        body.lb-disable-scrolling {
        overflow: hidden;
        }

        .lightboxOverlay {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
        background-color: black;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
        opacity: 0.8;
        display: none;
        }

        .lightbox {
        position: absolute;
        left: 0;
        width: 100%;
        z-index: 10000;
        text-align: center;
        line-height: 0;
        font-weight: normal;
        outline: none;
        }

        .lightbox .lb-image {
        display: block;
        height: auto;
        max-width: inherit;
        max-height: none;
        border-radius: 3px;

        /* Image border */
        border: 4px solid white;
        }

        .lightbox a img {
        border: none;
        }

        .lb-outerContainer {
        position: relative;
        *zoom: 1;
        width: 250px;
        height: 250px;
        margin: 0 auto;
        border-radius: 4px;

        /* Background color behind image.
            This is visible during transitions. */
        background-color: white;
        }

        .lb-outerContainer:after {
        content: "";
        display: table;
        clear: both;
        }

        .lb-loader {
        position: absolute;
        top: 43%;
        left: 0;
        height: 25%;
        width: 100%;
        text-align: center;
        line-height: 0;
        }

        .lb-cancel {
        display: block;
        width: 32px;
        height: 32px;
        margin: 0 auto;
        background: url(../images/loading.gif) no-repeat;
        }

        .lb-nav {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 10;
        }

        .lb-container > .nav {
        left: 0;
        }

        .lb-nav a {
        outline: none;
        background-image: url('data:image/gif;base64,R0lGODlhAQABAPAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
        }

        .lb-prev, .lb-next {
        height: 100%;
        cursor: pointer;
        display: block;
        }

        .lb-nav a.lb-prev {
        width: 34%;
        left: 0;
        float: left;
        background: url(../images/prev.png) left 48% no-repeat;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;
        -webkit-transition: opacity 0.6s;
        -moz-transition: opacity 0.6s;
        -o-transition: opacity 0.6s;
        transition: opacity 0.6s;
        }

        .lb-nav a.lb-prev:hover {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
        }

        .lb-nav a.lb-next {
        width: 64%;
        right: 0;
        float: right;
        background: url(../images/next.png) right 48% no-repeat;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;
        -webkit-transition: opacity 0.6s;
        -moz-transition: opacity 0.6s;
        -o-transition: opacity 0.6s;
        transition: opacity 0.6s;
        }

        .lb-nav a.lb-next:hover {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
        }

        .lb-dataContainer {
        margin: 0 auto;
        padding-top: 5px;
        *zoom: 1;
        width: 100%;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        }

        .lb-dataContainer:after {
        content: "";
        display: table;
        clear: both;
        }

        .lb-data {
        padding: 0 4px;
        color: #ccc;
        }

        .lb-data .lb-details {
        width: 85%;
        float: left;
        text-align: left;
        line-height: 1.1em;
        }

        .lb-data .lb-caption {
        font-size: 13px;
        font-weight: bold;
        line-height: 1em;
        }

        .lb-data .lb-caption a {
        color: #4ae;
        }

        .lb-data .lb-number {
        display: block;
        clear: left;
        padding-bottom: 1em;
        font-size: 12px;
        color: #999999;
        }

        .lb-data .lb-close {
        display: block;
        float: right;
        width: 30px;
        height: 30px;
        background: url(../images/close.png) top right no-repeat;
        text-align: right;
        outline: none;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
        opacity: 0.7;
        -webkit-transition: opacity 0.2s;
        -moz-transition: opacity 0.2s;
        -o-transition: opacity 0.2s;
        transition: opacity 0.2s;
        }

        .lb-data .lb-close:hover {
        cursor: pointer;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
        }
    </style>
    <title>WINE360 - <?php echo e($winery->applicationName); ?></title>
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

  <!--about-->
  <div class="about py-5" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 text-center">
          <img src="<?php echo e(asset('img/interface/siber.png')); ?>" alt="phone" width="350" class="img-fluid phone-img"/>
          
        </div>
        <div class="col-lg-7 text-light text-center about-text">
          <h1 class="mr-auto"><?php echo e($winery->applicationName); ?></h1>
          <p class="lead">
            Obiteljsko poljoprivredno gospodarstvo Siber, svoje je mjesto za
            stvaranje pronašlo u trsevima erdutskog vinogorja gdje od 2003.
            godine na više od 10 hektara zemlje uzgaja kraljevske sorte vina
            koje na natjecanjima osvajaju titule šampiona.Vrhunska vina Siber
            rezultat su neprestanog istraživanja, pažnje i hrabrosti, koje
            redovito prepoznaju vinoljupci, ali i struka. Odmak od
            industrijske proizvodnje vidljiv je u svim detaljima, od bobice,
            pa sve do jedne od vrhunskih butelja ograničene serije ili pak
            vlastite sorte vina za meditaciju.
          </p>
        </div>
      </div>
      <!-- descritption -->
      <div class="row mt-5">
        <div class="col-lg-6 text-light text-center">
          <h3>Vinski asortiman</h3>
          <p class="lead">
            Vina iz linije Select proizvode se od ručno branog grožđa iz više
            mladih vinograda. Vina su svježa, voćna i prepoznatljivo sortna.
            Vina iz linije Premium dolaze s vrhunskih položaja, iz
            najsunčanijih redova u našim vinogradima. Grožđe beremo ručno,
            vina odležavaju na finom talogu nakon čega prelaze u velike bačve
            od slavonskog hrasta. Riječ je o elegantnim vinima snažne
            strukture i kompleksnih bouqueta, s jakom mineralnošću i
            prepoznatljivim elementima terroira. Vina iz linije Goldberg
            proizvode se od grožđa s najboljih čokota oko kojih nema mnogo
            humusa. Berba se obavlja u više faza, tako da u svakoj butelji
            Goldberga ima grožđa iz kasnih berbi. Vina odležavaju u drvenim
            bačvama različitih formata, a prije puštanja na tržište odležavaju
            i godinu dana u buteljama. Riječ je o našim prestižnim vinima na
            koja smo iznimno ponosni, i koja se pune u ograničenim količinama.
          </p>
        </div>
        <div class="col-lg-6">
          <img
            src="<?php echo e(asset('img/interface/asortiman.png')); ?>"
            width="100%"
            alt="Pakiranje"
          />
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-12 text-light">
          <h1 class="text-center mb-5">Nagrade</h1>
          <ul class="lead">
            <li>
              4. ocjenjivanje vina - “alaj fino to baranjsko vino” Veliko
              zlato, Cabernet Sauvignon, berba 2007. - Draž, 2010. godine
            </li>
            <li>
              Vinovita - Međunarodni sajam vina i opreme za vinarstvo i
              vinogradarstvo Zlatna diploma - Cabernet Sauvignon, berba 2007.
              - Zagreb, 2010. godine
            </li>
            <li>
              Vino Mostar 2010. godine. Zlatna medalja - Sauvignon vrhunsko
              vino, berba 2009. - Mostar, 2010. godine
            </li>
            <li>
              Moslavina - 19. izložba vina Hrvatske i vina izvornih sorti.
              Zlatna diploma - Muškat žuti, berba 2011. - Kutina, 2012. godine
            </li>
            <li>
              44. izložba vina kontinentalne Hrvatske Sveti Ivan Zelina.
              Zlatna diploma - Sauvignon, berba 2011. - Sveti Ivan Zelina,
              2012. godine
            </li>
            <li>
              BeoWinefair. Zlatna diploma - Cabernet Sauvignon, berba 2007. -
              Beograd, 2012. godine
            </li>
            <li>
              26. Smotra vinara Slavonije i Baranje, Trnava. Diploma sa
              zlatnom bocom - Muškat žuti, berba 2012. - Trnava, 2013. godine
            </li>
            <li>
              Sajam turizma Mostar, 2015. godine. Zlatna medalja - Cabernet
              Sauvignon - Mostar 2015. godine
            </li>
            <li>
              Decanter - World Wine Awards. Srebrna medalja - Muškat Žuti,
              berba 2015. godine - London, 2017. godine
            </li>
            <li>
              Decanter - World Wine Awards. Brončana medalja - Cabernet
              Sauvignon, berba 2011. godine - London, 2017. godine
            </li>
            <li>
              Dubrovnik FestiWine ocjenjivanje vina. Wine Competition Najbolje
              ocijenjeno ružičasto vino - Rose, berba 2018. godine -
              Dubrovnik, 2019. godine
            </li>
            <li>
              Centar za dizajn Hrvatske gospodarske komore. Pohvalu za dizajn
              ukupnog izgleda pakovine crvenih vina. Cabernet Sauvignon, berba
              2009. godine
            </li>
            <li>
              Moslavina - XVII. izložba vina Hrvatske i vina izvornih sorti.
              Izbor za najljepšu naljepnicu. Prvo mjesto za vino “Cabernet
              Sauvignon” - Kutina, 2010. godine
            </li>
            <li>
              14. Međunarodna izložba vina i sajam tradicionalnih proizvoda
              Bjelovarsko bilogorske županije. Vinodar 2012. godine.Srebrna
              medalja Za etiketu Cabernet Sauvignon. berba 2009. godine -
              Daruvar, 2012. godine
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- product grid -->
  <section class="recommended-products py-md-5">
    <div class="container">
      <h2 class="text-center mb-5">Proizvodi Vinarije Siber</h2>
      <div class="row">
        <?php $__currentLoopData = $wines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 mb-4">
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
  <!-- Kontakt -->
  <section class="contact py-5" id="contact" style="background-color: #40162c; color: #fff">
    <div class="container">
      <!--title-->
      <div class="row text-white text-center">
        <div class="col m-lg-4">
          <h1 class="display-4 mb-4 section-heading">
            Kontaktirajte Vinariju
          </h1>
          <div class="underline mb-5"></div>
        </div>
      </div>
      <!--title end-->
      <div class="row">
        <!-- Kontakt forma -->
        <div class="col-lg-6" id="contact-form-section">
          <form method="POST" action="<?php echo e(route('messages.store')); ?>">
            <?php echo csrf_field(); ?>  
            <input class="form-control1 text-center" type="text" name="configuration_id" id="configuration_id" value="<?php echo e($winery->id); ?>" hidden/>

            <div class="form-group">
              <label for="user_name">Ime</label>
              <input id="user_name" type="text" class="form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_name" value="<?php echo e(old('user_name')); ?>" required autofocus>
              <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
              <label for="message">Upit</label>
              <textarea id="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" required><?php echo e(old('message')); ?></textarea>
              <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                      <strong><?php echo e($message); ?></strong>
                  </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

            <button type="submit" class="btn btn-warning font-weight-bold">
              Pošalji
            </button>
          </form>
        </div>
        <!-- Google Maps -->
        <div class="col-lg-6">
          <div class="map-wrapper" id="google-maps-section">
            <div class="embed-responsive embed-responsive-16by9 rounded">
              <!-- Zamijenite "VAŠ_EMBED_LINK" s pravim embed linkom za Google Maps -->
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.545040102122!2d19.044833275977606!3d45.51923642976533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475c97a9e42f8037%3A0xfe52648832a5ad1d!2sVinarija%20Siber!5e0!3m2!1shr!2shr!4v1709563574662!5m2!1shr!2shr"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                height="100%"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--contact end-->
  <!-- blog grid -->
  <section class="recommended-products py-md-5">
    <div class="container">
      <h2 class="text-center mb-5">Siber - Novosti</h2>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img  src="<?php echo e(asset('img/interface/vinoMockup.png')); ?>" class="card-img-top" alt="Vino 1" />
           
            <div class="card-body">
              <h5 class="card-title">Novost 1</h5>
              <p class="card-text">Opis novosti 1.</p>
              <a href="#" class="btn btn-warning font-weight-bold"
                >Pogledaj</a
              >
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="<?php echo e(asset('img/interface/vinoMockup.png')); ?>" class="card-img-top" alt="Vino 2" />
            
            <div class="card-body">
              <h5 class="card-title">Novost 2</h5>
              <p class="card-text">Opis novosti 2.</p>
              <a href="#" class="btn btn-warning font-weight-bold"
                >Pogledaj</a
              >
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="<?php echo e(asset('img/interface/vinoMockup.png')); ?>" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Novost 3</h5>
              <p class="card-text">Opis novosti 3.</p>
              <a href="#" class="btn btn-warning font-weight-bold"
                >Pogledaj</a
              >
            </div>
          </div>
        </div>
      </div>
      <!-- Gumb za arhivu bloga -->
      <div class="text-center mt-4">
        <a href="archiveBlog.html" class="btn btn-warning font-weight-bold"
          >Sve novosti</a
        >
      </div>
    </div>
  </section>
  <!-- recommended blog grid end -->

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
<?php /**PATH C:\Projekti\wine360\resources\views/winery/product.blade.php ENDPATH**/ ?>