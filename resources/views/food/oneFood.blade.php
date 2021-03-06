<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton', ['countryCode' => $countryCode]) 

@section('content')

<div class="container">
				<div class="row rowBottomPadding">
					<div class="col-xs-8 col-sm-10">
						<div class="row">
							<div class="col-xs-12">
								<h4>{{ $oneFood->date }}</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h5>{{ $oneFood->country->name }}</h5>
							</div>
						</div>
					</div>
					
					<div class="col-xs-4 col-sm-2">
						<form action="{{ url('/food/edit/'.$oneFood->id) }}" method="GET" class="marginTopBottom">						
			                {{ csrf_field() }}
			                <!-- <button type="submit" class="btn btn-warning pull-right">Edit</button> -->
					        <button type="submit" class="btn btn-warning pull-right">
					          	<span class="glyphicon glyphicon-edit"></span> Edit
					        </button>
			            </form>		
			        </div>	
				</div>

				<!-- image(s) -->
				@foreach($oneFood->images as $img)
					<div class="row foodImageRow">
						<div class="col-xs-12">
							<img class="img-responsive imageHundredPercentWidth" src="{{Storage::disk('public')->url($img->filename)}}" alt="{{$img->filename}}">							
						</div>					
					</div>
				@endforeach	
				
				<!-- rating -->
				<div class="row foodRatingRow">
					<div class="col-xs-12">
						<strong>Rating</strong>			
						
						<div class="clearfix leftPadding">
							@if ($oneFood->rating == 0)
								<img class="pull-left ratingImagePoo" src="{{URL::asset('/img/SadPoopEmoji.jpg')}}" alt="Poop"> 
							@else
								@for ($i = 0; $i < $oneFood->rating; $i++)
							        <img class="pull-left ratingImage" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
							    @endfor
							@endif	
						</div>
					</div>					
				</div>
				
				<!-- comment, if any -->
				@if(!is_null($oneFood->comment))
					<div class="row">
						<div class="col-xs-12">
							<strong>Comment</strong>
							<br/>
							<textarea class="form-control txtAreaNonEdge" rows="4" readonly style="background-color: white;">{{$oneFood->comment}}</textarea>							
						</div>					
					</div>
				@endif
</div>

@endsection 

@section('page-script')
	<script type="text/javascript">

        $("#btnNewestToOldest").click(function() {
        	$("#filterOption").val("newestToOldest");
            this.form.submit();
       	});

        $("#btnOldestToNewest").click(function() {
        	$("#filterOption").val("oldestToNewest");
            this.form.submit();
       	});

    </script>

@endsection
