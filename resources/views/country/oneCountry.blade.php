<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton') @section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>{{ $oneCountry->name }}</h4>
			</div>

			<div class="panel-body">

				{{ $oneCountry->id }} 
				
				@if (count($foodList) > 0)
					<!--  form -->
					<form action="{{ url('#') }}" method="POST" class="form-horizontal">
	
						<div class="form-group">
							<div class="col-sm-6">
	
								{{ csrf_field() }}
								<button type="submit" class="btn btn-neutral" id="btnNewestToOldest" value="newestToOldest">
									<i class="fa fa-btn fa-trash">Newest</i>
								</button>
	
								{{ csrf_field() }}
								<button type="submit" class="btn btn-neutral" id="btnOldestToNewest" value="oldestToNewest">
									<i class="fa fa-btn fa-trash">Oldest</i>
								</button>
	
							</div>
						</div>
						<input id="filterOptionOneCountry" type="hidden" name="filterOptionOneCountry" value="newestToOldest">
					</form>	
	
					@foreach($foodList as $food)
						<a href="{{ url('/food/'.$food->id) }}">
							<div class="row">
								<div class="col-sm-10">
									@if ($food->images->isNotEmpty()) 
										<img class="img-responsive" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
									@else 
										<img class="img-responsive" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available" width="100%"> 
									@endif
								</div>								
								
								<div class="col-sm-2">
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
					<div>No Food to display</div>
				@endif
			</div>
		</div>
	</div>
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
