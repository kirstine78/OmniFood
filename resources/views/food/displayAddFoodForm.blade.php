<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('skeleton')

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
                    <form action="{{ url('/food') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('POST') }}

                        @include('food/foodForm')

                        <!-- Add food button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Add Food</button>
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
		
		        var controlForm = $('.controls:first'),
		            currentEntry = $(this).parents('.entry:first'),
		            newEntry = $(currentEntry.clone()).appendTo(controlForm);
		
		        newEntry.find('input').val('');
		        controlForm.find('.entry:not(:last) .btn-add')
		            .removeClass('btn-add').addClass('btn-remove')
		            .removeClass('btn-success').addClass('btn-danger')
		            .html('<span class="glyphicon glyphicon-minus"></span>');
		    }).on('click', '.btn-remove', function(e) {
		    	$(this).parents('.entry:first').remove();
		
				e.preventDefault();
				return false;
			});
		});

    </script>
@endsection