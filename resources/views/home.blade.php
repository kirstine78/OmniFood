<!--

Name:		Kirstine Broerup Nielsen
Date:       18.06.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Home</h4></div>

                <div class="panel-body">
	                    
                    @if (count($foodList) > 0)
	
						@foreach($foodList as $food)
							<a href="{{ url('/food/'.$food->id) }}">
								<div class="row">
									<div class="col-sm-10">
										@if ($food->images->isNotEmpty()) 
											<img class="img-responsive imageHundredPercentWidth" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
										@else 
											<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available"> 
										@endif
									</div>
									
									<div class="col-sm-2">
										<div class="row">
											<div class="col-sm-12">{{ $food->country->name }}</div>	
										</div>
										<div class="row">
											<div class="col-sm-12">{{ $food->date }}</div>	
										</div>										
										<div class="row">									
											<div class="col-sm-12 clearfix">
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
								</div>
								<div class='hiddenID' style="display: none;">{{ $food->id }}</div>		
								<hr />
							<a/>
						@endforeach

                    @else
                        <div>Wow, you must be hungry!</div>
                        <div>Better get started eating, add some Food!</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
