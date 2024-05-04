<div style="width: 100%;display: inline-block;" class="cron-reminders-mail">
	<div style="padding-right:  15px;padding-left:  15px;margin-right:  auto;margin-left:  auto;width:  750px;padding-top: 50px;padding-bottom: 50px;" class="container">
		@php
		$url = url('/');
		@endphp
		<div style="width:  100%;
	margin:  0 auto;
	display:  block;background:  url({{ $url }}/img/interface/mailthing.png);
	background-repeat:  no-repeat;
	background-size:  100% auto;
	background-position:  100% 99.4%;
	padding-bottom:  235px;
	border-radius: 20px;" class="col-xs-12 content">
			<a style="display:  inline-block;
	margin:  40px auto 18px auto;
	width:  100%;" class="navbar-brand" target="_blank" href="{{ url('/') }}">
                <img style="width:  320px;
	display:  block;
	margin:  0 auto;" class="logo" src="{{ url('/') }}/img/Wine360-logo.png" alt="Wine360 logo">
            </a>
            <div style="display:  block;
	width:  300px;
	clear:  both;
	margin:  0 auto;margin-top: 0;
	margin-bottom: 20px;" class="row border">
                <img style="width: 100%;" class="border-img" src="{{ url('/') }}/img/login/border-line.png">
            </div>
			<h1 style="text-align:  center;
	color: #666666;
	margin-bottom: 50px;">{{ trans('configuration.title') }}</h1>

			<div style="width:  100%;
	margin:  0 auto;
	display:  inline-block;" class="col-xs-12">
			{{--<pre>
				@php
				//print_r($params);
				@endphp
			</pre>--}}
				<div style="display:  block;
	width:  400px;
	font-size: 13px;margin: 0 auto;
	color: #666666;background-color: rgb(255,255,255);" bgcolor="#ffffff" class="full-width">
					<div style="display: block;
width: 400px;
font-size: 17px;
color: #666666;
margin: 0 auto;" class="row">
						<p style="border-bottom: 1px solid #666666;
	padding-bottom: 5px;">{{ trans('configuration.emailSubject') }}: </p>
					</div>
					<div style="display:  block;
	width:  300px;
	clear:  both;
	margin:  0 auto;" class="row">
						<div style="display:  inline-block;
	float:  left;margin-right: 10px;
	margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('user.userName') }}: </span></div>
						<div style="display:  inline-block;
	float:  left;" class="single"><span style="font-size: 17px;">{{ $params->name }}</span></div>
					</div>
					<div style="display:  block;
	width:  300px;
	clear:  both;
	margin:  0 auto;" class="row">
						<div style="display:  inline-block;
	float:  left;margin-right: 10px;
	margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('user.userEmail') }}: </span></div>
						<div style="display:  inline-block;
	float:  left;" class="single"><span style="font-size: 17px;">{{ $params->email }}</span></div>
					</div>
					<div style="display:  block;
	width:  300px;
	clear:  both;
	margin:  0 auto;" class="row">
						<div style="display:  inline-block;
	float:  left;margin-right: 10px;
	margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('user.userPassword') }}: </span></div>
						<div style="display:  inline-block;
	float:  left;" class="single"><span style="font-size: 17px;">{{ $params->password }}</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>