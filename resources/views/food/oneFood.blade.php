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
				<div class="row">
					<div class="col-xs-9">
						<h4 style="display:inline-block;">{{ $oneFood->country->name }} ~ {{ $oneFood->date }}</h4>
					</div>	
					
					
					<div class="col-xs-3">
						<form action="{{ url('/food/edit/'.$oneFood->id) }}" method="GET" class="marginTopBottom">
						
			                {{ csrf_field() }}
			                <button type="submit" class="btn btn-warning">
			                    <i class="fa fa-btn fa-trash">Edit</i>
			                </button>
			            </form>		
			        </div>	
				</div>
			</div>

			<div class="panel-body">
				<!-- image(s) -->
				@foreach($oneFood->images as $img)
					<div class="row">
						<div class="col-sm-12">
							<img class="img-responsive imageHundredPercentWidth" src="{{Storage::disk('public')->url($img->filename)}}" alt="{{$img->filename}}">							
						</div>					
					</div>
				@endforeach	
				
				<!-- rating -->
				<div class="row">
					<div class="col-sm-12">
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
						<div class="col-sm-12">
							<strong>Comment</strong>
							<br/>
							<textarea class="form-control txtAreaNonEdge" rows="4" readonly style="background-color: white;">{{$oneFood->comment}}</textarea>							
						</div>					
					</div>
				@endif		
			</div>		
		</div>
	</div>
</div>

@endsection @section('page-script')
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
