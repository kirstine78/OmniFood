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
                <div class="panel-heading"><h4>Add Food</h4></div>

                <div class="panel-body">

                    <!--  form -->
                    <form action="{{ url('/food') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('POST') }}

                        @include('food/foodForm')

                        <!-- Add food button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus">Add Food</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection