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

                    @if (count($countries) > 0)
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search country..">
                        
                        
	                    <!--  form -->
	                    <form action="{{ url('#') }}" method="GET" class="form-horizontal">
	
	                        <div class="form-group" >
	                            <div class="col-sm-6">
	                            
					                {{ csrf_field() }}
					                <button type="submit" class="btn btn-neutral">
					                    <i class="fa fa-btn fa-trash" value="all" id="all">All</i>
					                </button>
					                
	                            
					                {{ csrf_field() }}
					                <button type="submit" class="btn btn-neutral">
					                    <i class="fa fa-btn fa-trash" value="done" id="done">Done</i>
					                </button>
					                
					                
	                            
					                {{ csrf_field() }}
					                <button type="submit" class="btn btn-neutral">
					                    <i class="fa fa-btn fa-trash" value="empty" id="empty">Empty</i>
					                </button>
					                
	                            </div>
	                        </div>
	                    </form>

                        <table class="table table-striped task-table"  id="myTable">
                            <!-- Table Headings -->
                            <thead>
                            <th>Done</th>
                            <th>Country</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <!-- done? -->
                                    <td class="table-text">
                                    	@if ($country->foods->isNotEmpty())
                                        	<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span>
                                        @endif
                                    </td>
                                    
                                    <!-- country name -->
                                    <td class="table-text">
                                        <div>{{ $country->name }}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <div>There are currently no Countries in the system</div>
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
    </script>
@endsection