<!--

Name:		Kirstine Broerup Nielsen
Date:       14.08.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton', ['countryCode' => $countryCode]) 

@section('content')

    <div class="container">
        <div class="row rowBottomPadding">
        	<div class="col-sm-12">
        		<h4>About OmniFood</h4>        		
        	</div>       		
        </div>

        <div class="row">                
	        <div class="col-xs-12 col-sm-8">
	        	<p>OmniFood was created in 2017 by Kirstine B. Nielsen.</p>
	        	<p>OmniFood is a great tool to use to help you keeping track of which cuisines you have tried out.</p>
				<br/>
	        	<p>
		        	At the Home page you will see all your food entries in a blog sort of way
		        	<ul>
					  <li>Max one image associated with the food entry</li>
					  <li>Country</li>
					  <li>Date</li>
					  <li>Rating</li>
					</ul> 
				</p>	
				<br/>
				<p>
		        	To see all details about an entry simply click on the entry
		        	<ul>
					  <li>All images associated with the food entry</li>
					  <li>Country</li>
					  <li>Date</li>
					  <li>Rating</li>
					  <li>Comment</li>
					</ul>
				</p>
				<br/>
				<p>
		        	You can also choose to see all food entries associated with a specific country.
		        	<br/>
		        	Simply click the 'Worldwide' tab and choose the country of interest
					<br/>
					This will show details in a similar fashion as on the Home page, but country specific.		
					<br/>
					<br/>
					To see entries for a certain region or entries with a certain rating simply click one of the options under 'Regions'	or 'Ratings'.
	        	</p>
				<br/>	        	
	        	<p>It's now entirely up to you to see if you can complete a menu from each countries in the entire World.</p>	
	        	<p>Enjoy eating!</p>	        	
			</div>
	        <div class="col-xs-12 col-sm-4" id="contactUsCol">
	        	<h5><strong>Contact OmniFood</strong></h5>
	        	kirstine78@yahoo.com
			</div>
		</div>
		

        <div class="row">                
	        <div class="col-xs-12 col-sm-4 aboutImagePaddingTop">
				<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available">	        	
			</div>              
	        <div class="col-xs-12 col-sm-4 aboutImagePaddingTop">
				<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available">	 	        	
			</div>              
	        <div class="col-xs-12 col-sm-4 aboutImagePaddingTop">
				<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available">	 	        	
			</div>
		</div>
		
    </div>

@endsection