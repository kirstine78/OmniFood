
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
				<h4>Add Food</h4>
			</div>
		</div>
		
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('/food') }}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="addFoodForm">
                        {{ method_field('POST') }}

                        @include('food/foodForm')

                        <!-- Add food button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="addButton" class="btn btn-success">Add Food</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
	<script type="text/javascript">

		var valToSetToCountry = $('#selCountryGroup').data().valueToSetTo;
		
		$("div.country_drop_down select").val(valToSetToCountry);

		var valToSetToRating = $('#radRatingGroup').data().valueToSetTo;
		
		$('input[name=rating][value=' + valToSetToRating + ']').prop('checked',true);	

		$(function() {
		    $(document).on('click', '.btn-add', function(e) {
		        e.preventDefault();
		
		        var controlForm = $('.controls:first');

		        if (controlForm.find('.entry').length < 3) {		  
			        var currentEntry = $(this).parents('.entry:first');
			        var newEntry = $(currentEntry.clone()).appendTo(controlForm);
			
			        newEntry.find('input').val('');
			              
			        controlForm.find('.entry:not(:last) .btn-add')
			            .removeClass('btn-add').addClass('btn-remove')
			            .removeClass('btn-success').addClass('btn-danger')
			            .html('<span class="glyphicon glyphicon-minus"></span>');
		        }
		    }).on('click', '.btn-remove', function(e) {
		    	$(this).parents('.entry:first').remove();
		
				e.preventDefault();
				return false;
			});
		});


		$("#addFoodForm").submit(function(event){
			// alert("button clicked");

			// flag
		    var isValid = true;
		    
		    // if date is ahead of today update flag
		    var nowDate = new Date();
		    var dateEnteredString = $("#date").val();
		    
// 			alert("Now: " + nowDate);
// 		    alert("date entered: " + $("#date").val());
		    
			if (isValidDate(dateEnteredString)) {
// 				alert("date is valid");

				// create a Date
		    	var dateEnteredDate = new Date(dateEnteredString);
				
				// check if date entered is in future				
				if (dateEnteredDate > nowDate) {
				  	// selected date is in the future
// 					alert("dateEnteredDate is in the future");
					isValid = false;
				}
				
			} else {
			  	// date is not entered
// 				alert("date INVALID");
				isValid = false;				
			}

		    if (!isValid) {
				$("#date").css("background-color","#ff5e5e");
		        event.preventDefault();
		    }
		});

		/**
		https://stackoverflow.com/questions/18758772/how-do-i-validate-a-date-in-this-format-yyyy-mm-dd-using-jquery
		*/
		function isValidDate(dateString) {
		  	var regEx = /^\d{4}-\d{2}-\d{2}$/;

		  	if(!dateString.match(regEx)) {
		    	return false;  // Invalid format
		  	}
		  	
		  	var d;

		  	if(!((d = new Date(dateString))|0)) {
		    	return false; // Invalid date (or this could be epoch)
		  	}
		  	
		  	return d.toISOString().slice(0,10) == dateString;
		}

    </script>
@endsection