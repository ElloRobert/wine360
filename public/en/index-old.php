<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<title>Wine360</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="">

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</head>
<body>

<!-- Place your content here -->

<section id="title">
	<div class="logo-block">
		<div class="logo-text">
		  <h1>Web i mobilna aplikacija za uštede u voznom parku</h1>
		  <a class="go-to" href="#"><img src="img/arrow.svg"></a>
		</div>

	</div>
</section>
<section id="scroll">
<div id="pinContainer">
	<div id="slideContainer">
    <div class="car" style="transform: matrix(1, 0, 0, 1, -200, 0);">
				<img class="car-img" src="img/car.svg" />
			</div>
		<section id="one" class="panel one">
			<div class="layer1"></div>
			<div class="layer2"></div>
			<div class="layer3"></div>
			<div class="garage"></div>
			<div id="first_one" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
						<p><span>Wine360</span></p>
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

			<b>ONE</b>
		</section>
		<section id="two" class="panel two">
			<div class="layer1"></div>
			<div class="layer2"></div>
			<div class="layer3"></div>
			<div class="station">
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
					<p><span>-> optimizirajte potrošnju</span></p>
					</div>
				</div>
			</div>
			<div class="cta">
					<img src="img/button.svg" />
				</div>
			</div>

			</div>
			<b>TWO</b>
		</section>
		<section id="three" class="panel three">
			<div class="layer1"></div>
			<div class="layer2"></div>
			<div class="layer3"></div>
			<div class="workshop">
			<div id="first_three" class="info-box">
			<div class="holder">
				<div class="text" style="display:none;">
					<div class="box">
					<p><span>Neispravnost?</span></p>
					<p>Uslikajte, zapišite, dogovorite servis.</p>

					</div>
				</div>
			</div>
			<div class="cta">
					<img src="img/button.svg" />
				</div>
			</div>
			</div>
			<b>THREE</b>
		</section>
		<section id="four" class="panel four">
			<div class="parking-block">

			</div>
			<div class="layer1"></div>
			<div class="layer2"></div>
			<div class="layer3"></div>
			<b>FOUR</b>
		</section>
		<section id="five" class="panel five">
			<div class="login-panel">
				<div class="form">
				<p>Organizirano</p>
				<p>Pristupačno</p>
				<p>Bez papira</p>
				<p>Efikasno</p>
				<p>Mobilno</p>

				<form action="/action_page.php">

				<div class="form-container">
				<div class="field">
					<input class="form-input" type="email" placeholder="Vaš e-mail" name="uname" required>
					<i class="material-icons">person_outline</i>
				</div>
				<div class="field">
					<input class="form-input" type="password" placeholder="Vaša lozinka" name="psw" required>
					<i class="material-icons">lock_outline</i>
				</div>

					<button class="submit_btn" type="submit">Prijava</button>
				</div>

				<div class="container" style="background-color:#f1f1f1">
					<span class="psw">Zaboravljena <a href="#">lozinka?</a></span><br>
					<span class="psw reg">Niste član našeg tima? <a href="#">Registracija</a></span>
				</div>
				</form> 
				<p class="form-nav"><a href="/impressum/" target="_blank">Impressum</a> | <a href="/uvjeti" target="blank">Uvjeti korištenja</a></p>
				</div>

			</div>
			<div class="layer1"></div>
			<div class="layer2"></div>
			<div class="layer3"></div>
			<b>FIVE</b>
		</section>
	</div>
</div>
</section>



<!-- SCRIPTS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>