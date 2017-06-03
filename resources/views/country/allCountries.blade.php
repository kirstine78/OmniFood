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

                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search country..">
                        
                        
	                <!--  form -->
                    <form action="{{ url('#') }}" method="POST" class="form-horizontal">

                        <div class="form-group" >
                            <div class="col-sm-6">
                            
				                {{ csrf_field() }}
				                <button type="submit" class="btn btn-neutral" id="btnAll" value="all" >
				                    <i class="fa fa-btn fa-trash">All</i>
				                </button>
				                
                            
				                {{ csrf_field() }}
				                <button type="submit" class="btn btn-neutral" id="btnDone" value="done" >
				                    <i class="fa fa-btn fa-trash">Done</i>
				                </button>
				                
				                
                            
				                {{ csrf_field() }}
				                <button type="submit" class="btn btn-neutral" id="btnEmpty" value="empty" >
				                    <i class="fa fa-btn fa-trash">Empty</i>
				                </button>
				                
                            </div>
                        </div>
                         <input id="filterOption" type="hidden" name="filterOption" value="all">
                    </form>
	                    
                    @if (count($countries) > 0)

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
                                        <div class='hiddenID' style="display: none;">{{ $country->id }}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <div>No Country to display</div>
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

        $("#btnAll").click(function() {
        	$("#filterOption").val("all");
            this.form.submit();
       	});

        $("#btnDone").click(function() {
        	$("#filterOption").val("done");
            this.form.submit();
       	});

        $("#btnEmpty").click(function() {
        	$("#filterOption").val("empty");
            this.form.submit();
       	});

       	// clickable row
        $('.table > tbody > tr').click(function() {
            // row was clicked
            //alert($(this).find('.hiddenID').text());
            var hiddenID = $(this).find('.hiddenID').text();
            var url = '/country/' + hiddenID;
            //alert (url);
            // redirect
            window.location.href = url;
        });
    </script>
@endsection