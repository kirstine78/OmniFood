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
	<link href="{{ asset('/css/jasny-bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dcalendar.picker.css') }}" rel="stylesheet">

	<script src="{{ asset('/js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
	<script src="{{ asset('/js/jasny-bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/dcalendar.picker.js') }}"></script>

</head>
<body >
<div class="container">
<div class="row">

	<nav class="navbar navbar-default custom_nav_bar navbar-fixed-top">

		<div class="container-fluid" id="myContainerFluid">

			<div class="navbar-header">			
			
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a href="{{ url('home') }}" class="navbar-brand" id="omniFoodLogo">OmniFood</a>
				
				<form action="/food" method="GET" id="newButtonFormSmallScreen">
	            	{{ csrf_field() }}
	            	<!-- <button type="submit" class="btn btn-success navbar-btn pull-right" id="newButtonSmallScreen">New</button> -->
	                <button type="submit" class="btn btn-primary navbar-btn pull-right" id="newButtonSmallScreen">
			          	<span class="glyphicon glyphicon-plus"></span> New
			        </button>	
			        <input type="hidden" type="text" value="{{ $countryCode }}" name="countryCode">		        
			    </form>
				
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">

					<li class="nav_buttons myNavbarItem"><a href="{{ url('home') }}" style="color:black;">Home</a></li>
					<li class="nav_buttons myNavbarItem"><a href="{{ url('countries') }}" style="color:black;">Worldwide</a></li>					
					<li class="dropdown myNavbarItem">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">
							Regions<span class="caret"></span>
						</a>						
						<ul class=" dropdown-menu" role="menu">
							<li><a href="{{ url('countries?region=Africa') }}" class="myNavbarItem">Africa</a></li>
							<li><a href="{{ url('countries?region=Antarctica') }}" class="myNavbarItem">Antarctica</a></li>
							<li><a href="{{ url('countries?region=Asia') }}" class="myNavbarItem">Asia</a></li>
							<li><a href="{{ url('countries?region=Australia+/+Oceania') }}" class="myNavbarItem">Australia / Oceania</a></li>
							<li><a href="{{ url('countries?region=Europe') }}" class="myNavbarItem">Europe</a></li>
							<li><a href="{{ url('countries?region=North+America') }}" class="myNavbarItem">North America</a></li>
							<li><a href="{{ url('countries?region=South+America') }}" class="myNavbarItem">South America</a></li>
						</ul>					
					</li>		
					
									
					<li class="dropdown myNavbarItem">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">
							Ratings<span class="caret"></span>
						</a>						
						<ul class=" dropdown-menu" role="menu">
							<li><a href="{{ url('ratings') }}" class="myNavbarItem">All</a></li>
							<li>
								<a href="{{ url('ratings?rating=5') }}" class="myNavbarItem">
									@for ($i = 0; $i < 5; $i++)
								        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
								    @endfor
								</a>
							</li>
							<li>
								<a href="{{ url('ratings?rating=4') }}" class="myNavbarItem">
									@for ($i = 0; $i < 4; $i++)
								        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
								    @endfor
								</a>
							</li>
							<li>
								<a href="{{ url('ratings?rating=3') }}" class="myNavbarItem">
									@for ($i = 0; $i < 3; $i++)
								        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
								    @endfor
								</a>
							</li>
							<li>
								<a href="{{ url('ratings?rating=2') }}" class="myNavbarItem">
									@for ($i = 0; $i < 2; $i++)
								        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
								    @endfor
								</a>
							</li>
							<li>
								<a href="{{ url('ratings?rating=1') }}" class="myNavbarItem">
									@for ($i = 0; $i < 1; $i++)
								        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
								    @endfor
								</a>
							</li>
							<li>
								<a href="{{ url('ratings?rating=0') }}" class="myNavbarItem">
									<img class="ratingImagePooSmallVersion" src="{{URL::asset('/img/SadPoopEmoji.jpg')}}" alt="Poop">
								</a>
							</li>
						</ul>					
					</li>
					
								
					<li class="nav_buttons myNavbarItem"><a href="{{ url('about') }}" style="color:black;">About</a></li>						
				</ul>
				
				
				<form action="/food" method="GET" id="newButtonFormBigScreen">
	                {{ csrf_field() }}
	                <!-- <button type="submit" class="btn btn-success navbar-btn navbar-nav navbar-right" id="newButtonBigScreen">New</button> -->
	                <button type="submit" class="btn btn-primary navbar-btn navbar-nav navbar-right" id="newButtonBigScreen">
			          	<span class="glyphicon glyphicon-plus"></span> New
			        </button>
			        <input type="hidden" type="text" value="{{ $countryCode }}" name="countryCode">
	            </form>

				<!-- Right Side Of Navbar -->
				<ul id="navbarUserName" class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
						<li class="myNavbarItem"><a href="{{ url('/login') }}">Login</a></li>
					@else
						<li class="dropdown myNavbarItem">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="myNavbarItem">
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

</div>
</div>

	@yield('content')
	
	@yield('page-script')


    <script type="text/javascript">
		$(document).ready(function(){
			$('.btn').mouseenter(function(){
				$(this).addClass('btnHover');
			});
			
			$('.btn').mouseleave(function(){
				$(this).removeClass('btnHover');
			});
		}); 
    </script>
</body>

</html>
