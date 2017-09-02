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
		<div class="col-xs-12">
			<h4>{{ $oneCountry->name }}</h4>
		</div>
	</div>
				
	@if (count($foodList) > 0)
				
		<div class="row rowBottomPadding">
			<div class="col-xs-12">				
				<a href="?filterOptionOneCountry=newestToOldest" class="btn btn-default" id="btnNewestToOldest">Newest</a>
				<a href="?filterOptionOneCountry=oldestToNewest" class="btn btn-default" id="btnOldestToNewest">Oldest</a>
			</div>
		</div>
	
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
						<div class="row">
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
		<div>No Food to display</div>
	@endif
</div>

@endsection 

@section('page-script')
	<script type="text/javascript">

		$(document).ready(function(){
			var theButtonThatIsClicked = '#btnNewestToOldest';  // default
			
			if ( '{{ $filterOptionOneCountry }}' == 'newestToOldest') {
				theButtonThatIsClicked = '#btnNewestToOldest';
			} else if  ( '{{ $filterOptionOneCountry }}' == 'oldestToNewest') {
				theButtonThatIsClicked = '#btnOldestToNewest';				
			}
			
			$(theButtonThatIsClicked).addClass('btnActiveClicked');
		});

		
        $("#btnNewestToOldest").click(function() {
        	$("#filterOptionOneCountry").val("newestToOldest");
            this.form.submit();
       	});

        $("#btnOldestToNewest").click(function() {            
        	$("#filterOptionOneCountry").val("oldestToNewest");
            this.form.submit();
       	});
	</script>

@endsection
