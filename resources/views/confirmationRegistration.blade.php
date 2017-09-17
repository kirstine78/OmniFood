<!DOCTYPE html>
<html lang="en-US">
    <head>
	    <!--
	
		Name:		Kirstine Broerup Nielsen
		Date:       17.09.2017
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
    <body>
		<div class="container">
	        <h2>Confirmation</h2>
	        <br/>
	
	        <div class="row">                
		        <div class="col-xs-12">
		        	<p>You have successfully verified your account.</p>
	        		<br/>		        	
			        <a href="/login" class="btn btn-default">Go to Login Page</a>
			    </div>
			</div>
		</div>
    </body>
</html>