<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<title>Wine360</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#31B89F">
	<!-- <link rel="icon" sizes="192x192" href="Wine360-chrome.png"> -->
	<link rel="shortcut icon" href="favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/indexStyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(public_path('css/cookiecuttr.css')); ?>">
	<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	    crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	    crossorigin="anonymous"></script>

	<script src="/js/jquery.cookie.js"></script>
	<script src="/js/jquery.cookiecuttr.js"></script>
</head>

<body>

	<!-- Home page content -->

	<section id="title">
		<div class="cloud one"></div>
		<div class="cloud two"></div>
		<ul class="select-lang">
			<li class="dropdown">
				<img width="30" src="img/hr.svg">
				<ul>
					<li>
						<img width="30" src="img/hr.svg">
					</li>
					<li>
						<a href="/en"><img width="30" src="img/gb.svg"></a>
					</li>
					<li>
						<a href="/de"><img width="30" src="img/de.svg"></a>
					</li>
				</ul>
			</li>
		</ul>
		<a href="<?php echo e(route('login')); ?>" class="login-btn">Prijava</a>
		<div class="logo-block">
			<div class="logo-text">
				<img src="img/Wine360-logo.svg" alt="Wine360 logo">
				<h1>Web i mobilna aplikacija za uštede u voznom parku</h1>
				<a class="go-to" href="#">
					<img src="img/arrow.svg">
				</a>
			</div>

		</div>
	</section>
	<!-- Section with garage START -->
	<section id="one" class="pinDiv panel">
		<div class="layer1"></div>
		<div class="layer2"></div>
		<div class="layer3"></div>
		<div class="garage"></div>
		<div class="car">
			<img class="car-img" src="img/car.svg" />
		</div>
		<div id="first_one" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>
							<span>Wine360</span>
						</p>
						<p>aplikacija stalno je uz Vas!</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div id="second_one" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>Opišite, slikajte i pratite Vaša vozila</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div id="third_one" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>Informacije o Vašim vozilima nikad nisu bile bliže</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div class="cloud">
			<h1>Pratite Vaše vozilo...</h1>
		</div>
		<div class="nav-btn">
			<ul>
				<li class="next">
					<i class="material-icons">expand_more</i>
				</li>
			</ul>
		</div>
	</section>
	<!-- Section with garage END -->
	<!-- Section with gas station START-->
	<section id="two" class="pinDiv panel">
		<div class="layer1"></div>
		<div class="layer2"></div>
		<div class="layer3"></div>
		<div class="car">
			<img class="car-img" src="img/car.svg" />
		</div>
		<div id="first_two" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>Smanjite troškove i</p>
						<p>povećajte isplativost</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div id="second_two" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>Upišite podatke o punjenju</p>
						<p>
							<span>-> optimizirajte potrošnju</span>
						</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div class="station">
			<div class="station-front"></div>


		</div>
		<div class="cloud">
			<h2>Bilježite svako punjenje...</h2>
		</div>
		<div class="nav-btn">
			<ul>
				<li class="prev">
					<i class="material-icons">expand_less</i>
				</li>
				<li class="next">
					<i class="material-icons">expand_more</i>
				</li>
			</ul>
		</div>
	</section>
	<!-- Section with gas station END -->
	<!-- Section with workshop START -->
	<section id="three" class="pinDiv panel">
		<div class="layer1"></div>
		<div class="layer2"></div>
		<div class="layer3"></div>
		<div class="car">
			<img class="car-img" src="img/car.svg" />
		</div>
		<div id="first_three" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p>
							<span>Neispravnost?</span>
						</p>
						<p>Uslikajte, zapišite, dogovorite servis.</p>
					</div>
				</div>
			</div>
			<div class="cta">
				<img src="img/button.svg" />
			</div>
		</div>
		<div class="elevator"></div>
		<div class="workshop"></div>
		<div class="sticky">
			<p class="title">Podsjeti me!</p>
			<ul class="list">
				<li>
					<i class="material-icons">done</i>
					<span> servis </span>
				</li>
				<li>
					<i class="material-icons">done</i>
					<span> gorivo</span>
				</li>
				<li>
					<i class="material-icons">done</i>
					<span> tekućina</span>
				</li>
				<li>
					<i class="material-icons">done</i>
					<span> ostalo</span>
				</li>
			</ul>
		</div>
		<div class="cloud">
			<h2>...troškove održavanja...</h2>
		</div>
		<div class="nav-btn">
			<ul>
				<li class="prev">
					<i class="material-icons">expand_less</i>
				</li>
				<li class="next">
					<i class="material-icons">expand_more</i>
				</li>
			</ul>
		</div>
	</section>
	<!-- Section with workshop END -->
	<!-- Section with parking START -->
	<section id="four" class="pinDiv panel">
		<div class="layer1"></div>
		<div class="layer2"></div>
		<div class="layer3"></div>
		<div class="parking-block">

		</div>
		<div class="car">
			<img class="car-img" src="img/car.svg" />
		</div>
		<div class="cloud">
			<h2>... i prijeđenu kilometražu!</h2>
		</div>
		<div class="nav-btn">
			<ul>
				<li class="prev">
					<i class="material-icons">expand_less</i>
				</li>
				<li class="next">
					<i class="material-icons">expand_more</i>
				</li>
			</ul>
		</div>
	</section>
	<!-- Section with parking END -->
	<!-- Section with login START -->
	<section id="five" class="pinDiv panel">
		<div class="login-panel">
			<div class="lights">
				<div class="form">
					<img class="logo" src="img/Wine360-logo.svg" alt="Wine360 logo">
					<p>Organizirano</p>
					<p>Pristupačno</p>
					<p>Bez papira</p>
					<p>Efikasno</p>
					<p>Mobilno</p>

					<form action="<?php echo e(route('login')); ?>" method="POST">

						<div class="form-container">
							<div class="field-group">
								<div class="field">
									<input class="form-input" type="email" placeholder="e-mail..." name="email" required>
									<i class="material-icons">
										<img src="img/user-icon.svg" width="25">
									</i>
								</div>
								<div class="field">
									<input class="form-input" type="password" placeholder="lozinka..." name="password" required>
									<i class="material-icons">
										<img src="img/password-icon.svg" width="25">
									</i>
								</div>
							</div>

							<div class="submit-row">
								<button class="submit_btn" type="submit">Prijava</button>
							</div>
						</div>

						<div class="container" style="background-color:#f1f1f1; text-align: center;">
							<span style="margin-bottom: 8px;display: block;" class="psw">Zaboravljena
								<a href="<?php echo e(route('password.request')); ?>">lozinka?</a>
							</span>
							<span class="psw reg">Postanite dio Wine360 ekipe.
								<a href="<?php echo e(route('register')); ?>">REGISTRACIJA</a>
							</span>
						</div>
					</form>
					<p class="form-nav">
						<a href="/impressum.php">Impressum</a> |
						<a href="/terms.php">Uvjeti korištenja</a> |
						<a href="/uvjeti-privatnosti.php">Uvjeti privatnosti</a>
					</p>
				</div>
			</div>



		</div>
		<div class="layer1"></div>
		<div class="layer2"></div>
		<div class="layer3"></div>

	</section>
	<!-- Section with login END -->




	<!-- SCRIPTS -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
	<script src="js/main.js"></script>
<script>
	$(document).ready(function () {
        $.cookieCuttr({
            cookieAnalyticsMessage: "Naše web stranice koriste kolačiće kako bi Vama omogućili najbolje korisničko iskustvo, za analizu prometa i korištenje društvenih mreža.<br><b>Neophodni kolačići</b> su neophodni za rad naše web stranice i korištenje njegovih značajki i / ili usluga.<br><b>Ostali kolačići</b> obuhvaćaju kolačiće za dijeljenje sadržaja na društvene mreže te za praćenje posjetitelja web stranice u svrhu statistika i poboljšanja naših usluga.<br><br>",
            cookieAcceptButtonText:"Prihvaćam sve kolačiće",
            cookieDeclineButton: true,
            cookieDeclineButtonText:"Prihvaćam samo neophodne kolačiće",
            cookieWhatAreTheyLink: "",
            cookieWhatAreLinkText:"",
        });

		//uvjeti-privatnosti stranica (promijeniti link) reset kolačića
		if (window.location.href.indexOf('uvjeti-privatnosti') != -1){
			if ($.cookie('cc_cookie_accept') == "cc_cookie_accept") {
				$.cookieCuttr({
					cookieResetButton: true,
					cookieResetButtonText: "Resetirajte postavke kolačića za ovu web stranicu"
				});
				$(".cc-cookies").prepend( "<b>Prihvatili ste sve kolačiće</b><br>" );
			}
			if ($.cookie('cc_cookie_decline') == "cc_cookie_decline") {
				$.cookieCuttr({
					cookieResetButton: true,
					cookieResetButtonText: "Resetirajte postavke kolačića za ovu web stranicu"
				});
				$(".cc-cookies").prepend( "<b>Prihvatili ste samo neophodne kolačiće</b><br>" );
			}
		}
    });
</script>
<script type="text/javascript">
    if ($.cookie('cc_cookie_accept') == "cc_cookie_accept"){
    	var _gaq = _gaq || [];
	    _gaq.push(['_setAccount', 'UA-109604660-27']);
	    _gaq.push (['_gat._anonymizeIp']);
	    _gaq.push(['_trackPageview']);

	    (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document. getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	    })();
    }else{
    	$.cookie('__utma', '', { domain: '.Wine360.eu', expires: -1, path: '/' });
	    $.cookie('__utmb', '', { domain: '.Wine360.eu', expires: -1, path: '/' });
	    $.cookie('__utmc', '', { domain: '.Wine360.eu', expires: -1, path: '/' });
	    $.cookie('__utmt', '', { domain: '.Wine360.eu', expires: -1, path: '/' });
	    $.cookie('__utmz', '', { domain: '.Wine360.eu', expires: -1, path: '/' });
    }
</script>
</body>

</html><?php /**PATH C:\Projekti\Wine360\resources\views/index.blade.php ENDPATH**/ ?>