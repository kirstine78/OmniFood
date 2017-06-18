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
											<img class="img-responsive" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
										@else 
											<img class="img-responsive" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available" width="100%"> 
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
								
@section('page-script')
    <script type="text/javascript">
    	// function to search in a table
        function mySearchFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if ($(td).first().text().toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        $("#btnAll").click(function() {
        	$("#filterOptionAllCountries").val("all");
            this.form.submit();
       	});

        $("#btnDone").click(function() {
        	$("#filterOptionAllCountries").val("done");
            this.form.submit();
       	});

        $("#btnEmpty").click(function() {
        	$("#filterOptionAllCountries").val("empty");
            this.form.submit();
       	});

       	// clickable row
        $('.table > tbody > tr').click(function() {
            
            // row was clicked            
            //alert($(this).find('.hiddenID').text());
            var hiddenID = $(this).find('.hiddenID').text();
            var url = '/country/' + hiddenID;
            //alert (url);
            // redirect
            window.location.href = url;
        });

        // on click make text bold
        $('tr').click(function(e){ 
            $(this).css("font-weight","bold");
            e.stopPropagation(); 
         });
    </script>
@endsection
