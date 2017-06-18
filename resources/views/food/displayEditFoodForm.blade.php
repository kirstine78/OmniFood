<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Edit or Delete Food</h4></div>
                    
                    <!--  form -->
					<form action="/food/{{ $food->id }}" method="POST">
                    	{{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myConfirmModal" ><i class="fa fa-btn fa-trash">Delete</i></button>
                    </form> 
                Food id: {{ $food->id }}

                <div class="panel-body">

                    <!--  form -->
                    <form action="{{ url('/food/edit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PUT') }}

                        @include('food/foodForm')

                        <!-- Edit food button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Submit Changes</i>
                                </button>
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
                                    <button id="btnConfirmYes" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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

    </script>
@endsection
