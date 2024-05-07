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
    <link rel="stylesheet" href="css/lightbox.css" />

    <title>WINE360 - Arhiva Vinarija</title>
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
              <a href="naslovna.html" class="nav-link m-2 menu-item nav-active">
                O aplikaciji
              </a>
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

    <!--vinarije-korisnici-->
    <section class="py-5 arhiva" id="korisnici-vinarije">
      <div class="container-fluid">
        <!--title-->
        <div class="row text-center">
          <div class="col m-4">
            <h1 class="display-4 mb-4 section-heading">Vinarije</h1>
            <div class="underline2 mb-4"></div>
            <p class="lead">
              Naši zadovoljni korisnici koji su prepoznali digitalni potencijal
              u upravljanju proizvodnjom vina
            </p>
          </div>
        </div>
        <!--title end-->
        <ul
          class="list-inline text-center text-uppercase font-weight-bold my-4"
        >
          <li
            class="list-inline-item gallery-list-item active-item"
            data-filter="sve"
          >
            Sve <span class="mx-md-5 mx-3 text-muted">/</span>
          </li>
          <li
            class="list-inline-item gallery-list-item"
            data-filter="slavonijaPodunavlje"
          >
            SLAVONIJA I PODUNAVLJE <span class="mx-5 text-muted">/</span>
          </li>
          <li
            class="list-inline-item gallery-list-item"
            data-filter="dalmacija"
          >
            DALMACIJA <span class="mx-md-5 mx-3 text-muted">/</span>
          </li>
          <li
            class="list-inline-item gallery-list-item"
            data-filter="istraKvarner"
          >
            ISTRA I KVARNER <span class="mx-md-5 mx-3 text-muted">/</span>
          </li>
          <li
            class="list-inline-item gallery-list-item"
            data-filter="bregovitaHrvatska"
          >
            BREGOVITA HRVATSKA
          </li>
        </ul>
        <div class="container">
          <div class="row mt-5">

          <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
            <div class="card">
              <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
              <div class="card-body">
                <h5 class="card-title">Vinarija Belje</h5>
                <p class="card-text">Slavonija i Podunavlje</p>
                <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
              </div>
            </div>
          </div>
        <!-- Vinarija Bubrig -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Bubrig</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Deak -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter istraKvarner">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Deak</h5>
              <p class="card-text">Istra i Kvarner</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Deak (ponovljena) -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Deak</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Jakob -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Jakob</h5>
              <p class="card-text">Slavonija i Podunavlje</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Kalažić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Kalažić</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Siber -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Siber</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Szabo -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Szabo</h5>
              <p class="card-text">Slavonija i Podunavlje</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Tošić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter istraKvarner">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Tošić</h5>
              <p class="card-text">Istra i Kvarner</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Vinković -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Vinković</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Zabić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Zabić</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
         <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Belje</h5>
              <p class="card-text">Slavonija i Podunavlje</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Bubrig -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Bubrig</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Deak -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter istraKvarner">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Deak</h5>
              <p class="card-text">Istra i Kvarner</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Deak (ponovljena) -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Deak</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Jakob -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Jakob</h5>
              <p class="card-text">Slavonija i Podunavlje</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Kalažić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Kalažić</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Siber -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Siber</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Szabo -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter slavonijaPodunavlje">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Szabo</h5>
              <p class="card-text">Slavonija i Podunavlje</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Tošić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter istraKvarner">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Tošić</h5>
              <p class="card-text">Istra i Kvarner</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Vinković -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter bregovitaHrvatska">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Vinković</h5>
              <p class="card-text">Bregovita Hrvatska</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        <!-- Vinarija Zabić -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 filter dalmacija">
          <div class="card">
            <img src="{{ asset('img/interface/vinoMockup.png') }}" class="card-img-top" alt="Vino 3" />
            <div class="card-body">
              <h5 class="card-title">Vinarija Zabić</h5>
              <p class="card-text">Dalmacija</p>
              <a href="singleVinarija.html" class="btn btn-warning font-weight-bold">Istraži</a>
            </div>
          </div>
        </div>
        </div>
        </div>
      </div>
    </section>
    <!--vinarije-korisnici end-->

    
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

    <script>
      $(document).ready(function () {
        $(".nav-button").click(function () {
          $(".nav-button").toggleClass("change");
        });

        $(window).scroll(function () {
          let position = $(this).scrollTop();
          if (position >= 200) {
            $(".nav-menu").addClass("custom-navbar");
          } else {
            $(".nav-menu").removeClass("custom-navbar");
          }
        });

        $(window).scroll(function () {
          let position = $(this).scrollTop();
          if (position >= 1400) {
            $(".gallery").addClass("change");
          } else {
            $(".gallery").removeClass("change");
          }
        });

        $(".gallery-list-item").click(function () {
          let value = $(this).attr("data-filter");
          if (value === "sve") {
            $(".filter").show(400);
          } else {
            $(".filter")
              .not("." + value)
              .hide(400);
            $(".filter")
              .filter("." + value)
              .show(400);
          }
        });

        $(".gallery-list-item").click(function () {
          $(this).addClass("active-item").siblings().removeClass("active-item");
        });

        $('#sorteVina').change(function() {
            var selectedSorta = $(this).val();
            $('#vine .col-lg-4').hide(400);
            $('#vine .col-lg-4.' + selectedSorta).show(400);
          });


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


      });
    </script>
  </body>
</html>
