<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Countries</h2></div>

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
                            <th>Rego no</th>
                            <th>Brand</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <!-- country name -->
                                    <td class="table-text">
                                        <div>{{ $country->fldName }}</div>
                                    </td>

                                    <!-- country continent -->
                                    <td class="table-text">
                                        <div>{{ $country->fldContinent }}</div>
                                    </td>


                                    <!-- Vehicle Update Hire Rate Button -->
                                    <td>
                                        <form action="vehicle/{{ $country->id }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-btn fa-trash">Update Hire Rate</i>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Vehicle Retire Button -->
                                    <td>
                                        <form action="vehicle/retire/{{ $country->id }}" method="POST">
                                            {{ csrf_field() }}

                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myConfirmModal" ><i class="fa fa-btn fa-trash">Retire</i></button>
                                        </form>
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

@section('page-script')
    <script type="text/javascript">
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if ($(td).first().text().toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // handle when modal shows
        $('#myConfirmModal').on('show.bs.modal', function (e) {
            // on show confirm dialog modal, select the event's related button ("retire" btn in form) that got clicked.
            var btnForm = $(e.relatedTarget);

            // when click yes on dialog box
            $('#btnConfirmYes').on("click", function () {

                // the parent called 'form' has the correct vehicle id
                btnForm.parent('form').submit();
            });
        });
    </script>
@endsection