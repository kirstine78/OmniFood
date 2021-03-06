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
				<h4>{{ $title }}</h4>
			</div>
		</div>

        <div class="row">                
	        <div class="col-xs-12 col-sm-5 colBottomPadding">
		        <a href="/countries?filterOptionAllCountries=all&region={{$region}}" class="btn btn-default" id="btnAll">All</a>
		        <a href="/countries?filterOptionAllCountries=done&region={{$region}}" class="btn btn-default" id="btnDone"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> Done</a>
		        <a href="/countries?filterOptionAllCountries=empty&region={{$region}}" class="btn btn-default" id="btnEmpty">No Entry</a>
			</div>
			
			<div class="col-xs-12 col-sm-7 colBottomPadding">
				<input class="form-control " type="text" id="myInput" onkeyup="mySearchFunction()" placeholder="Search country.." >     
			</div>
		</div>
		         
		@if (count($countries) > 0)
            <div class="row">
				<div class="col-xs-12">
					<table class="table table-striped task-table"  id="myTable">
                        <!-- Table Headings -->
                        <thead>
	                        <tr class="row">
	                            <th class="col-xs-1">Done</th>
	                            <th class="col-xs-11">Country</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        	@foreach($countries as $country)
                                <tr class="row">
                                    <!-- done? -->
                                    <td class="col-xs-1 table-text">
                                    	@if ($country->foods->isNotEmpty())
                                        	<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span>
                                        @endif
                                    </td>
                                    
                                    <!-- country name -->
                                    <td class="col-xs-11 table-text">
                                        <div>{{ $country->name }}</div>
                                        <div class='hiddenID' style="display: none;">{{ $country->id }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
        @else
            <div>No Countries to display</div>
        @endif        
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">

		$(document).ready(function(){

			// determine which link (btn) should have bold text (look active) 
			var theButtonThatIsClicked = '#btnAll';  // default
			
			if ( '{{ $filterOptionAllCountries }}' == 'all') {
				theButtonThatIsClicked = '#btnAll';
			} else if  ( '{{ $filterOptionAllCountries }}' == 'done') {
				theButtonThatIsClicked = '#btnDone';				
			} else if  ( '{{ $filterOptionAllCountries }}' == 'empty') {
				theButtonThatIsClicked = '#btnEmpty';
			}
			$(theButtonThatIsClicked).addClass('btnActiveClicked');

		});
			
		
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


       	// clickable table row
        $('.table > tbody > tr').click(function() {            
            // row was clicked            
            //alert($(this).find('.hiddenID').text());
            var hiddenID = $(this).find('.hiddenID').text();
            var url = '/country/' + hiddenID;
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