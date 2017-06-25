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
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">   	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dcalendar.picker.css') }}" rel="stylesheet">

	<script src="{{ asset('/js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
	<script src="{{ asset('/js/dcalendar.picker.js') }}"></script>

</head>
<body class="body_bg">

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="heading_bar" id="titleBanner"><h1 class="title">OmniFood</h1></div>
			</div>
			<div class="col-md-4">
				<form action="/food" method="GET" class="marginTopBottom">
	                {{ csrf_field() }}
	                <button type="submit" class="btn btn-success">
	                    <i class="fa fa-btn fa-trash">New Food</i>
	                </button>
	            </form>
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

					<li class="nav_buttons"><a href="{{ url('home') }}" style="color:black;">Home</a></li>
					<li class="nav_buttons"><a href="{{ url('countries') }}" style="color:black;">Worldwide</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">North America</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">South America</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Europe</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Asia</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Australia / Oceania</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Africa</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Antarctica</a></li>
					<li class="nav_buttons"><a href="{{ url('brands') }}" style="color:black;">Reviews</a></li>
					
				</ul>

				<!-- Right Side Of Navbar -->

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endif
				</ul>

			</div>

		</div>

	</nav>

	@yield('content')
	
	@yield('page-script')

</body>

</html>
