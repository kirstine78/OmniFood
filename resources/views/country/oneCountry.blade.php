<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton') @section('content')

<div class="container">
	<div class="row rowBottomPadding">
		<div class="col-xs-12">
			<h4>{{ $oneCountry->name }}</h4>
		</div>
	</div>
				
	@if (count($foodList) > 0)
				
		<div class="row rowBottomPadding">
			<div class="col-xs-12">
				<!--  form -->
				<form action="{{ url('#') }}" method="POST" class="form-horizontal">
				
					{{ csrf_field() }}
					<button type="submit" class="btn btn-neutral" id="btnNewestToOldest" value="newestToOldest">Newest</button>
				
					{{ csrf_field() }}
					<button type="submit" class="btn btn-neutral" id="btnOldestToNewest" value="oldestToNewest">Oldest</button>
	
					<input id="filterOptionOneCountry" type="hidden" name="filterOptionOneCountry" value="newestToOldest">
				</form>	
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

@endsection @section('page-script')
	<script type="text/javascript">

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
