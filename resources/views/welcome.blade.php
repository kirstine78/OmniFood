<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>OmniFood</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="{{ asset('/css/landingPage.css') }}" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
		<div class="container">
		    <div class="row"><!-- start row -->
		        @if (Route::has('login'))
		            <div class="top-right links">
		                @if (Auth::check())
		                    <a href="{{ url('/home') }}">Home</a>
		                @else
		                    <a href="{{ url('/login') }}">Login</a>
		                    <a href="{{ url('/register') }}">Register</a>
		                @endif
		            </div>
		        @endif
			</div><!-- end row -->
			
			<div class="row"><!-- start row -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
		
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
		
						<div class="item active">
							<img src="{{URL::asset('/img/slideSample1.jpg')}}" alt="landing page img" style="width:100%;">
							<div class="carousel-caption">
								<div class="title m-b-md">
									OmniFood
								</div>
								<div class="landingPageSubtext">
									<p>Welcome to OmniFood</p>
									<p>Taste food from all around the World</p>
									<p>Can you complete all countries?</p>
									<p>Register or Login</p>
								</div>
							</div>
						</div>
		
						<div class="item">
							<img src="{{URL::asset('/img/slideSample1.jpg')}}" alt="landing page img" style="width:100%;">
							<div class="carousel-caption">
								<div class="title m-b-md">
									OmniFood
								</div>
								<div class="landingPageSubtext">
									<p>Welcome to OmniFood</p>
									<p>Taste food from all around the World</p>
									<p>Can you complete all countries?</p>
									<p>Register or Login</p>
								</div>
							</div>
						</div>
		
						<div class="item">
							<img src="{{URL::asset('/img/slideSample1.jpg')}}" alt="landing page img" style="width:100%;">
							<div class="carousel-caption">
								<div class="title m-b-md">
									OmniFood
								</div>
								<div class="landingPageSubtext">
									<p>Welcome to OmniFood</p>
									<p>Taste food from all around the World</p>
									<p>Can you complete all countries?</p>
									<p>Register or Login</p>
								</div>
							</div>
						</div>
		
					</div>
		
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
		
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div><!-- end row -->   
			<div id="titleAndSubtextSectionSmallDevice">
				<div id="titleSmallDevice" class="m-b-md">
					OmniFood
				</div>
				<div id="subtextSmallDevice" >
					<p>Welcome to OmniFood</p>
					<p>Taste food from all around the World</p>
					<p>Can you complete all countries?</p>
					<p>Register or Login</p>
				</div>   
			</div> 
	   	</div> <!-- end container -->
    </body>
</html>
