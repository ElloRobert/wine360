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

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	    crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	    crossorigin="anonymous"></script>
</head>

<body>
    <section class="panel subpage">
    	<ul class="select-lang terms-impressum">
			<li class="dropdown">
				<img width="30" src="img/gb.svg">
				<ul>
					<li>
						<a href="https://Wine360.eu/impressum.php"><img width="30" src="img/hr.svg"></a>
					</li>
					<li>
						<img width="30" src="img/gb.svg">
					</li>
					<li>
						<a href="https://Wine360.eu/de/impressum.php"><img width="30" src="img/de.svg"></a>
					</li>
				</ul>
			</li>
		</ul>
        <div class="layer1"></div>
        <div class="layer2"></div>
		<div class="layer3"></div>
		<div class="home-cloud">
			<a href="/en" title="Naslovna">
				<img src="img/Wine360-logo.svg" alt="Wine360 logo">		
			</a>
		</div>
        <div class="content-space">
            <div class="big-panel">
            <h1>IMPRESSUM</h1>
            <p>
            Wine360 fleet management software is developed in collaboration between companies <a href="https://www.ofir.hr/" target="_blank">Ofir d.o.o.</a> and <a href="http://jet.hr/" target="_blank">Jet Osijek d.o.o.</a>.
            <br/>
            All questions should be sent to <a href="mailto:info@Wine360.eu">info@Wine360.eu</a>
            <br/>
            <br/>
			<h2>Ofir d.o.o.</h2>
			<p>
				Address:
				<br/>
				<a href="https://goo.gl/maps/MHoHmfDmnzF2" target="_blank">Ramska 20, HR - 31000 Osijek</a>
				<br/>
				<a href="https://goo.gl/maps/3EPd9BhqsMp" target="_blank">I. Gundulića 5/II, HR - 31000 Osijek</a>
				<br/>
				<br/>
				Contact:
				<br/>
				Tel: <a href="tel:+38531273236">+385 (0)31 273 236</a>
				<br/>
				Mob: <a href="tel:+385976900208">+385 (0)97 690 0208</a>, <a href="tel:+38598437585">+385 (0)98 437 585</a>
				<br/>
				E-mail: <a href="mailto:info@ofir.hr">info@ofir.hr</a>
				<br/>
				Office hours: Mon - Fri, 08:00 - 16:00
			</p>
			<p>
				<br/>
				<br/>
				Company:
				<br/>
				IBAN: HR5323600001101368262 | SWIFT: ZABAHR2X
				<br/>
				VAT ID: HR90020897203
			</p>

			<br/>
			<br/>
			<h2>Jet Osijek d.o.o.</h2>
			<p>
				Address: 
				<br/>
				<a href="https://goo.gl/maps/pP7YUmVMaqk" target="_blank">Vinkovačka cesta 68, HR – 31000 Osijek</a>
				<br/>
				<br/>
				Contact:
				<br/>
				Tel: <a href="tel:+38531211690">+385 (0)31 211 690</a>
				<br/>
				Fax: +385 (0)31 209 289
				<br/>
				E-mail: <a href="mailto:info@jet.hr">info@jet.hr</a>
				<br/>
				Office hours: Mon - Fri, 08:00 - 16:00
			</p>

			<p>
				<br/>
				<br/>
				Company:
				<br/>
				IBAN: HR6124020061100002792 | SWIFT: ESBCHR22
				<br/>
				VAT ID: HR59858651270
            </p>
            </div>
        </div>
    </section>
<script>
	var w = $(window).width();
	var h = $(window).height();
	console.log('Width:' + w + '| Height:' + h);
</script>
<script type="text/javascript">
	$('.select-lang .dropdown').click(function(){
        if($('.select-lang .dropdown ul').css('display') == 'block'){
            $('.select-lang .dropdown ul').hide();
        }else{
            $('.select-lang .dropdown ul').show();
        }
    });
</script>
</body>

</html>