<!--

Name:		Kirstine Broerup Nielsen
Date:       18.06.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton', ['countryCode' => $countryCode])

@section('content')

    <div class="container">
        <div class="row rowBottomPadding">
        	<div class="col-sm-12">
        		<h4>Home <small>~ Completed: {{$amountOfCountriesWithFoodEntry}} of {{$amountOfCountries}}</small></h4>        		
        	</div>       		
        </div>
		
	                    
        @if (count($foodList) > 0)
	
			@foreach($foodList as $food)
						
				<a href="{{ url('/food/'.$food->id) }}">
					<div class="row">
						<div class="col-sm-9 col-lg-10">
							@if ($food->images->isNotEmpty()) 
								<img class="img-responsive imageHundredPercentWidth" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
							@else 
								<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available"> 
							@endif
						</div>
										
						<div class="col-sm-3 col-lg-2">
							<div class="row countryNamePadding">
								<div class="col-xs-12">{{ $food->country->name }}</div>	
							</div>
						
							<div class="row datePadding">
								<div class="col-xs-12">{{ $food->date }}</div>	
							</div>										
						
							<div class="row">									
								<div class="col-xs-12 clearfix">
									@if ($food->rating == 0)
										<img class="pull-left ratingImagePoo" src="{{URL::asset('/img/SadPoopEmoji.jpg')}}" alt="Poop"> 
									@else
										@for ($i = 0; $i < $food->rating; $i++)
									        <img class="pull-left ratingImage" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
									    @endfor
									@endif	
									
								</div>
							</div>
						</div>		
							
						<div class='hiddenID' style="display: none;">{{ $food->id }}</div>		
							
					</div>
				</a>
				<hr />
			@endforeach

		@else
          	<div>Wow, you must be hungry!</div>
            <div>Better get started eating, add some Food!</div>
        @endif

    </div>

@endsection
