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
                <div class="panel-heading"><h4>Edit Food</h4></div>

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

    </script>
@endsection
