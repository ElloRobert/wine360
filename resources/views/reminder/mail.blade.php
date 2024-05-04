<style type="text/css">
html {
    background: #18b7a0;
    background: -moz-linear-gradient(-45deg, #18b7a0 0%, #16a0da 100%);
    background: -webkit-linear-gradient(-45deg, #18b7a0 0%,#16a0da 100%);
    background: linear-gradient(135deg, #18b7a0 0%,#16a0da 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#18b7a0', endColorstr='#16a0da',GradientType=1 );
    height: 100vh;
}
.container {
	padding-right:  15px;
	padding-left:  15px;
	margin-right:  auto;
	margin-left:  auto;
}
.col-xs-12 {
	width:  100%;
	margin:  0 auto;
	display:  block;
}
.content{
	background:  url(https://Wine360.eu/img/interface/mailthing.png);
	background-repeat:  no-repeat;
	background-size:  100% auto;
	background-position:  100% 99.4%;
	padding-bottom:  155px;
	border-radius: 20px;
}
.navbar-brand{
	display:  inline-block;
	margin:  40px auto 18px auto;
	width:  100%;
}
.navbar-brand img{
	width:  320px;
	display:  block;
	margin:  0 auto;
}
.full-width{
	display:  block;
	width:  100%;
	font-family: 'Montserrat semibold';
	font-size: 13px;
	color: #666666;
}
.row{
	display:  block;
	width:  300px;
	clear:  both;
	margin:  0 auto;
}
.row p{
	border-bottom: 1px solid #666666;
	padding-bottom: 5px;
}
.row .single{
	display:  inline-block;
	float:  left;
}
.row .single:first-child{
	margin-right: 10px;
	margin-bottom: 10px;
}
.row.border{
	margin-top: 30px;
	margin-bottom: 20px;
}
.row.border img{
	width: 100%;
}
h1{
	text-align:  center;
	font-family: 'Montserrat semibold';
	color: #666666;
	margin-bottom: 50px;
}
@media (max-width:  768px) {
	.col-xs-12{
		width:  100%;
	}
	.navbar-brand img{
		width:  250px;
	}
}
@media (min-width:  768px) {
	.container {
		width:  750px;
	}
	.col-xs-12{
		width:  600px;
	}
}
@media (min-width:  992px) {
	.container {
		width:  970px;
	}
}
@media (min-width:  1200px) {
	.container {
		width:  1170px;
	}
}
</style>
<div style="background: #18b7a0;
    background: -moz-linear-gradient(-45deg, #18b7a0 0%, #16a0da 100%);
    background: -webkit-linear-gradient(-45deg, #18b7a0 0%,#16a0da 100%);
    background: linear-gradient(135deg, #18b7a0 0%,#16a0da 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#18b7a0', endColorstr='#16a0da',GradientType=1 );
    width: 100%;display: inline-block;" class="cron-reminders-mail">
	<div style="padding-right:  15px;padding-left:  15px;margin-right:  auto;margin-left:  auto;width:  750px;padding-top: 50px;padding-bottom: 50px;" class="container">
		<div style="width:  100%;
	margin:  0 auto;
	display:  block;background:  url(https://Wine360.eu/img/interface/mailthing.png);
	background-repeat:  no-repeat;
	background-size:  100% auto;
	background-position:  100% 99.4%;
	padding-bottom:  235px;
	border-radius: 20px;" class="col-xs-12 content">
			<a style="display:  inline-block; margin:  40px auto 18px auto; width:  100%;" class="navbar-brand" target="_blank" href="{{ url('/') }}">
                <img style="width:  320px; display:  block; margin:  0 auto;" class="logo" src="https://demo.Wine360.eu/img/Wine360-logo.png" alt="Wine360 logo">
            </a>
            <div style="display:  block; width:  300px; clear:  both; margin:  0 auto;margin-top: 30px; margin-bottom: 20px;" class="row border">
                <img style="width: 100%;" class="border-img" src="https://demo.Wine360.eu/img/login/border-line.png">
            </div>
			<h1 style="text-align:  center; color: #666666; margin-bottom: 50px;">{{ trans('reminder.deleteReminderMsg_1') }}</h1>

			<div style="width:  100%; margin:  0 auto; display:  inline-block;" class="col-xs-12">
			{{--<pre>
				@php
				//print_r($params);
				@endphp
			</pre>--}}
				<div style="display:  block; width:  450px; height:280px;font-size: 13px; color: #666666;background-color: rgb(255,255,255);margin: 0 auto; padding: 15px 15px;" class="full-width">
					<div style="display: block; width: 100%; font-size: 17px; color: #666666; margin: 0 auto; text-align: center;" class="row">
						<p style="border-bottom: 1px solid #666666; padding-bottom: 5px;">{{ trans('reminder.detailsReminder') }}: </p>
					</div>					
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('user.userName') }}: </span></div>
						<div style="display:  inline-block; float:  left;" class="single"><span style="font-size: 17px;">{{ $params->creator->name}}</span></div>
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block;	float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('user.userEmail') }}: </span></div>
						<div style="display:  inline-block; float:  left;" class="single"><span style="font-size: 17px;">{{ $params->creator->email }}</span></div>
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('reminder.reminderVehicle') }}: </span></div>
						<div style="display: inline-block; float: left;" class="single">
							@foreach ($params->vehicles as $index => $vehicle)
								<span style="font-size: 17px;">{{ $vehicle->name ?? '' }}</span>
								@if ($index < count($params->vehicles) - 1)
									<span>,</span>
								@endif
							@endforeach
						</div>						
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('reminder.reminderName') }}: </span></div>
						<div style="display:  inline-block; float:  left;" class="single"><span style="font-size: 17px;">{{ $params->name }}</span></div>
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('reminder.reminderCategory') }}: </span></div>
						<div style="display:  inline-block; float:  left;" class="single"><span style="font-size: 17px;">{{ $params->category }}</span></div>
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single"><span style="font-size: 17px;">{{ trans('reminder.reminderDetails') }}: </span></div>
						<div style="display:  inline-block; float:  left;" class="single"><span style="font-size: 17px;">{{ $params->details }}</span></div>
					</div>
					<div style="display:  block; width:  100%; clear:  both; margin:  0 auto;" class="row">
						<div style="display:  inline-block; float:  left;margin-right: 10px; margin-bottom: 10px;" class="single">
							<span style="font-size: 17px;">{{ trans('malfunction.malfunctionEndDate') }}: 
						</span></div>
						<div style="display:  inline-block; float:  left;" class="single">
							<span style="font-size: 17px;">
								{{ $params->end_date_reminder }}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>