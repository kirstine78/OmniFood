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
				<h2>{{ $oneCountry->name }}</h2>
			</div>

			<div class="panel-body">

				{{ $oneCountry->id }} 
				
				@if (count($foodList) > 0)
					<!--  form -->
					<form action="{{ url('#') }}" method="POST" class="form-horizontal">
	
						<div class="form-group">
							<div class="col-sm-6">
	
								{{ csrf_field() }}
								<button type="submit" class="btn btn-neutral"
									id="btnNewestToOldest" value="newestToOldest">
									<i class="fa fa-btn fa-trash">New -> Old</i>
								</button>
	
								{{ csrf_field() }}
								<button type="submit" class="btn btn-neutral"
									id="btnOldestToNewest" value="oldestToNewest">
									<i class="fa fa-btn fa-trash">Old -> New</i>
								</button>
	
							</div>
						</div>
						<input id="filterOption" type="hidden" name="filterOption"
							value="newestToOldest">
					</form>
	
	
					@foreach($foodList as $food)
						<div class="row">
							<div class="col-sm-10">
								@if ($food->images->isNotEmpty()) 
									<img class="img-responsive" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
								@else 
									<img class="img-responsive" src="{{URL::asset('/img/not_available.jpg')}}" alt="img not available" width="100%"> 
								@endif
							</div>
							<div class="col-sm-2">{{ $food->date }}</div>
							<div class='hiddenID' style="display: none;">{{ $food->id }}</div>
							
						</div>
						<hr />
					@endforeach
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
