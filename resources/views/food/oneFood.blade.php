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
						<form action="/food" method="POST" class="marginTopBottom">
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
							<img class="img-responsive" src="{{Storage::disk('public')->url($img->filename)}}" alt="{{$img->filename}}">							
						</div>					
					</div>
				@endforeach	
				
				<!-- rating -->
				<div class="row">
					<div class="col-sm-12">
						<strong>Rating:</strong> {{ $oneFood->rating }}		
					</div>					
				</div>
				
				<!-- comment, if any -->
				@if(!is_null($oneFood->comment))
					<div class="row">
						<div class="col-sm-12">
							<strong>Comment:</strong> {{$oneFood->comment}}		
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

       	// clickable row
//         $('.table > tbody > tr').click(function() {
//             // row was clicked
//             //alert($(this).find('.hiddenID').text());
//             var hiddenID = $(this).find('.hiddenID').text();
//             var url = '/country/' + hiddenID;
//             //alert (url);
//             // redirect
//             window.location.href = url;
//         });
    </script>

@endsection
