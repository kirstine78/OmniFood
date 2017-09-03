<!--

Name:		Kirstine Broerup Nielsen
Date:       03.09.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton', ['countryCode' => $countryCode])

@section('content')

    <div class="container">
        <div class="row rowBottomPadding">
			<div class="col-xs-12">
				<h4>{{ $title }}</h4>
			</div>
		</div>

		@if (count($foodList) > 0)
			
			@if ($title == 'All Ratings')
		        <div class="row">                
			        <div class="col-xs-12 col-sm-5 colBottomPadding">
						<a href="?filterOptionRatings=bestToWorst" class="btn btn-default" id="btnBestToWorst">Best</a>
						<a href="?filterOptionRatings=worstToBest" class="btn btn-default" id="btnWorstToBest">Worst</a>
					</div>
				</div>
		    @endif
		       
            <div class="row">
				<div class="col-xs-12">
					<table class="table table-striped task-table"  id="myTable">
                        <!-- Table Headings -->
                        <thead>
	                        <tr class="row">
	                            <th class="col-xs-4">Rating</th>
	                            <th class="col-xs-8">Country / Img</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        	@foreach($foodList as $food)
                                <tr class="row">
                                    <!-- Rating -->
                                    <td class="col-xs-4 table-text">	
										@if ($food->rating == 0)
											<img class="ratingImagePooSmallVersion" src="{{URL::asset('/img/SadPoopEmoji.jpg')}}" alt="Poop"> 
										@else
											@for ($i = 0; $i < $food->rating; $i++)
										        <img class="ratingImageSmallVersion" src="{{URL::asset('/img/star.png')}}" alt="Star"> 
										    @endfor
										@endif	
                                    </td>
                                    
                                    <!-- country name / img -->
                                    <td class="col-xs-8 table-text">
                                    	<div class="row countryNameRowOnRatingPage">
                                    		<div class="col-xs-12">{{ $food->country->name }}</div> 
											<div class='hiddenID' style="display: none;">{{ $food->id }}</div>	                                   		
                                    	</div>
                                    	<div class="row">                                    	
                                    		<div class="col-xs-12">
												@if ($food->images->isNotEmpty()) 
													<img class="img-responsive imageHundredPercentWidth" src="{{Storage::disk('public')->url($food->images->first()->filename)}}" alt="{{$food->images->first()->filename}}"> 
												@else 
													<img class="img-responsive imageHundredPercentWidth" src="{{URL::asset('/img/no_image_available.jpeg')}}" alt="img not available"> 
												@endif
											</div>                                    		
                                    	</div>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
        @else
            <div>No Food to display</div>
        @endif        
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">

		$(document).ready(function(){

			// determine which link (btn) should have bold text (look active) 
			var theButtonThatIsClicked = '#btnBestToWorst';  // default
			
			if ( '{{ $filterOptionRatings }}' == 'bestToWorst') {
				theButtonThatIsClicked = '#btnBestToWorst';
			} else if  ( '{{ $filterOptionRatings }}' == 'worstToBest') {
				theButtonThatIsClicked = '#btnWorstToBest';				
			}
			$(theButtonThatIsClicked).addClass('btnActiveClicked');

		});


       	// clickable table row
        $('.table > tbody > tr').click(function() {            
            // row was clicked            
            //alert($(this).find('.hiddenID').text());
            var hiddenID = $(this).find('.hiddenID').text();
            var url = '/food/' + hiddenID;
            //alert (url);
            // redirect
            window.location.href = url;
        });

       	
        // on table row click make text bold
        $('tr').click(function(e){ 
            $(this).css("font-weight","bold");
            e.stopPropagation(); 
         });

		$('tr').mouseenter(function(){
			$(this).css('font-weight', 'bold');
		});
		
		$('tr').mouseleave(function(){
			$(this).css('font-weight', 'normal');
		});
		
    </script>
@endsection