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
                <div class="panel-heading"><h2>All Countries</h2></div>

                <div class="panel-body">

                    <form action="vehicle" method="GET" class="marginTopBottom">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-trash">Add new Vehicle</i>
                        </button>
                    </form>

                    @if (count($countries) > 0)
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for rego number..">

                        <table class="table table-striped task-table"  id="myTable">
                            <!-- Table Headings -->
                            <thead>
                            <th>Done</th>
                            <th>Country</th>
                            <th>Region</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <!-- done? -->
                                    <td class="table-text">
                                    	@if ($country->foods->isNotEmpty())
                                        	<div>done</div>
                                        @else
                                        	<div>not done</div>
                                        @endif
                                    </td>
                                    
                                    <!-- country name -->
                                    <td class="table-text">
                                        <div>{{ $country->name }}</div>
                                    </td>

                                    <!-- country continent -->
                                    <td class="table-text">
                                        <div>{{ $country->region }}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div id="myConfirmModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirm Retire</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to retire Vehicle?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnConfirmYes" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @else
                        <div>There are currently no vehicles in the system</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection