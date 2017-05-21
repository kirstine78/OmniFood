<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Name:		Kirstine Broerup Nielsen
 		Date:       14.05.2017
 		Project:    OmniFood
 		Version:    1.0
	-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OmniFood</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dcalendar.picker.css') }}" rel="stylesheet">

	<script src="{{ asset('/js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
	<script src="{{ asset('/js/dcalendar.picker.js') }}"></script>

</head>
<body class="body_bg">

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				here was an image
			</div>

			<div class="col-md-4">
				<div class="heading_bar" id="titleBanner"><h1 class="title">OmniFood</h1></div>
			</div>
		</div>
	</div>


	<nav class="navbar navbar-default custom_nav_bar">

		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">

					<li class="nav_buttons"><a href="{{ url('/') }}" style="color:black;">Home</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">New</a></li>
					<li class="nav_buttons"><a href="{{ url('suburbs') }}"  style="color:black;">All Countries</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">Africa</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">Asia</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">Europe</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">etc</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}"  style="color:black;">Reviews</a></li>
					
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
				</ul>

			</div>

		</div>

	</nav>

	@yield('content')

</body>
</html>
