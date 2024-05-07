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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">

    <title>WINE360 - {{$winery->applicationName}}</title>
  </head>
  <body>
    <!--Header-->
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top nav-menu">
        <a href="naslovna.html" class="navbar-brand text-light text-uppercase">
          <img src="{{ asset('img/interface/logo.svg') }}" alt="logo" />
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
  <!--about-->
    <div class="about py-5" id="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 text-center">
            <img src="{{ asset('img/interface/siber.png') }}" alt="phone" width="350" class="img-fluid phone-img"/>
          </div>
          <div class="col-lg-7 text-light text-center about-text">
            <h1 class="mr-auto">{{$winery->applicationName}}</h1>
            <div class="lead parent">
              {!! $winery->winery_description!!}
            </div>
            
          </div>
        </div>
        <!-- descritption -->
        <div class="row mt-5">
          <div class="col-lg-6 text-light text-center">
            <h3>Vinski asortiman</h3>
            <div class="lead parent">
              {!! $winery->wine_assortment!!}
            </div>
          </div>
          <div class="col-lg-6">
            <img
            src="{{ asset('img/interface/asortiman.png') }}"
            width="100%"
            alt="Pakiranje"
          />
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 text-light">
            <h1 class="text-center mb-5">Nagrade</h1>
            <div class="lead parent">
              {!! $winery->awards!!}
            </div>
          </div>
        </div>
      </div>
    </div>



   

    <!-- product grid -->
    <section class="recommended-products py-md-5">
      <div class="container">
        <h2 class="text-center mb-5">Preporučeni Proizvodi Vinarije</h2>
        <div class="row d-none d-sm-flex">
          @foreach($wines as $wine)
            <div class="col-lg-4 mb-4">
              <div class="card">
                @php
                  if(isset($wine->file_name_back)){
                    $frontImageUrl = asset('storage/' . $wine->file_name_back);   
                  }else{
                    $frontImageUrl = asset('img/interface/vino.png');   
                  }
                @endphp
                <img src="{{$frontImageUrl}}"  class="card-img-top" alt="Fotografija butelje">
                <div class="card-body">
                  <h5 class="card-title">{{$wine->name}}</h5>
                  <p class="card-text">{{$wine->product_description}}</p>
                  <a href="/wines/product/{{ $wine->id }}" class="btn btn-warning font-weight-bold">Pogledaj</a>
                </div>
              </div>
            </div>  
          @endforeach
        </div>

         

        <!-- Slider -->
        <div id="slider" class="carousel slide d-block d-sm-none" data-ride="carousel">
          <div class="carousel-inner">
            @foreach($wines as $key => $wine)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                @php
                                    if(isset($wine->file_name_back)){
                                        $frontImageUrl = asset('storage/' . $wine->file_name_back);   
                                    }else{
                                        $frontImageUrl = asset('img/interface/vino.png');   
                                    }
                                @endphp
                                <img src="{{$frontImageUrl}}"  class="card-img-top" alt="Fotografija butelje">
                                <div class="card-body">
                                    <h5 class="card-title">{{$wine->name}}</h5>
                                    <p class="card-text">{{$wine->product_description}}</p>
                                    <a href="/wines/product/{{ $wine->id }}" class="btn btn-warning font-weight-bold">Pogledaj</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
          <!-- Controls -->
          <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Prethodno</span>
          </a>
          <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sljedeće</span>
          </a>
        </div>
        <!-- Slider end-->
      </div>
    </section>
    <!--recomended product grid end-->
    <!-- Kontakt -->
    <section
      class="contact py-5"
      id="contact"
      style="background-color: #40162c; color: #fff"
    >
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
            <form method="POST" action="{{ route('messages.store') }}">
              @csrf  
              <input class="form-control1 text-center" type="text" name="configuration_id" id="configuration_id" value="{{ $winery->id }}" hidden/>
  
              <div class="form-group">
                <label for="user_name">Ime</label>
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autofocus>
                @error('user_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="message">Upit</label>
                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
        <h2 class="text-center mb-5">Novosti</h2>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="card">
              <img  src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 1" />
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
              <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 2" />
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
              <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
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
    <!-- footer end -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var slider = document.getElementById("slider");
    
            // Broj sličica u slideru
            var slides = slider.querySelectorAll(".carousel-item");
    
            // Postavljamo indeks aktivne sličice na 0
            var currentSlide = 0;
    
            // Prikazuje sljedeću sličicu
            function showNextSlide() {
                slides[currentSlide].classList.remove("active");
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add("active");
            }
    
            // Prikazuje prethodnu sličicu
            function showPreviousSlide() {
                slides[currentSlide].classList.remove("active");
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                slides[currentSlide].classList.add("active");
            }
    
            // Dodajemo event listenere za gumb za prikaz sljedeće sličice
            document.getElementById("nextBtn").addEventListener("click", showNextSlide);
    
            // Dodajemo event listenere za gumb za prikaz prethodne sličice
            document.getElementById("prevBtn").addEventListener("click", showPreviousSlide);
        });
    </script>
  </body>
</html>