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
			<div class="col-xs-7 col-sm-10">
				<h4>Edit or Delete</h4>
			</div>
					
			<div class="col-xs-5 col-sm-2">
				<!--  form -->
				<form action="/food/{{ $food->id }}" method="POST">
                  	{{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <!-- Trigger the modal with a button -->
                    <!-- <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myConfirmModal">Delete</button> -->                    
                    
                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myConfirmModal">
			          <span class="glyphicon glyphicon-trash"></span> Delete
			        </button>			        
                </form> 	
			</div>
		</div>
		
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!--  form -->
                    <form id="editFoodForm" action="{{ url('/food/edit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PUT') }}

                        @include('food/foodForm')

                        <!-- Edit food button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit Changes</button>
                            </div>
                        </div>
                    </form>             
                    
                    <!-- Modal -->
                    <div id="myConfirmModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirm Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Food?</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="btnConfirmYes" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                            </div>

                        </div>
                    </div><!-- end Modal -->                                     
                    
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

        // handle when modal shows
        $('#myConfirmModal').on('show.bs.modal', function (e) {
            // on show confirm dialog modal, select the event's related button ("delete" btn in form) that got clicked.
            var btnForm = $(e.relatedTarget);

            // when click yes on dialog box
            $('#btnConfirmYes').on("click", function () {

                // the parent called 'form' has the correct customer id
                btnForm.parent('form').submit();
            });
        });

     	// onclick handler for image delete btn
        $('.foodImageRow').on("click", ".deleteImage", function (evt) {
            evt.preventDefault();

            // we don't know whether it's the button element or the span element inside it with the trash can
			var elementClicked = $(evt.target);
			var foodImageRowDiv = elementClicked.parents('.foodImageRow');
            var imgId = foodImageRowDiv.data().imgId;
            var valueName = "deleteImgId[]";
            
			// add hidden input with the img id
			$('#editFoodForm').append("<input type='hidden' " + "name='" + valueName + "' value='" + imgId + "' />");		

			// hide image and img-delete button which are held in the row
			foodImageRowDiv.addClass('hidden');

			// determine if file input element should be shown
			var theControlForm = $('.controls:first');
			if (theControlForm.find('.deleteImage:not(:hidden)').length < 6) {
				$('.input-group').removeClass('hide');
			}	
        });

     	
		// handles when clicks the PLUS btn for image file input
		$(function() {
		    $(document).on('click', '.btn-add', function(e) {
		        e.preventDefault();
		
		        var controlForm = $('.controls:first');

		        // be sure to exlude the hidden images when counting the elements with class 'entry'
		        if (controlForm.find('.entry:not(:hidden)').length < 6) {		  
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

		
		$("#editFoodForm").submit(function(event){
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
