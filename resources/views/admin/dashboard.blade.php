@extends('layouts.admin')
@section('content')
@card_style()

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   Admin Dashboard
                </div>

                <div class="card-body">
                    <div class="row p-2">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <span class="text-capitalize" style=" font-size:18px;">
                               Welcome &nbsp;
                            </span>
                            <span class="text-warning font-weight-bold" style="color: purple!important; font-size: 18px;">
                                {{Auth::user()->first_name ?? ''}}
                            </span>
                    </div>
                    <div class="row p-2">
                        <!--Table and divs that hold the pie charts-->
                        <table class="columns table">
                            <tr>
                                <td>
                                    <div id="piechart_div" {{-- style="border: 1px solid #ccc" --}}></div>
                                </td>
                                <td>
                                    <div id="barchart_div" {{-- style="border: 1px solid #ccc" --}}></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="events_month_graph" {{-- style="border: 1px solid #ccc" --}}></div>
                                </td>
                                    <div id="events_student_graph" {{-- style="border: 1px solid #ccc" --}}></div>


                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent  

   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // No of student of each event 
    var eventsRegisteredStudents = {!! json_encode($eventsRegisteredStudents) !!};
    var EventsStudents = eventsRegisteredStudents.map(events => [events.name, events.no_students]); 

    // No of events of each staff 
    var staffEvents = {!! json_encode($staffEvents) !!};
    var StaffEvents = staffEvents.map(staff => [staff.staff_name, staff.no_events]); 
    
    // No of events of each staff 
    var EventsMonth = {!! json_encode($EventsMonth) !!};
    var eventsMonth = EventsMonth.map(event => [event.month, event.no_events]); 
   
      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        /********************************
        *   No of Events created by each staff
        ******************************/
        // prepare the graph
        var staff_events = new google.visualization.DataTable();
            staff_events.addColumn('string', 'Staff');
            staff_events.addColumn('number', 'No Events');
            staff_events.addRows(StaffEvents);

        // set graph options
        var piechart_options = {
            title: 'No of Events created by each staff',
            width: 400,
            height: 300,
            backgroundColor: '#E4E4E4',
            viewWindow: {
                min: [7, 30],
                max: [17, 30]
            }
        };
        // create the graph
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(staff_events, piechart_options);


        /********************************
        *   No of student of each event
        ******************************/ 
        // prepare the graph
        var event_students = new google.visualization.DataTable();
            event_students.addColumn('string', 'Event');
            event_students.addColumn('number', 'No Students');
            event_students.addRows(EventsStudents);

        // set graph options 
            var barchart_options = {
                title: 'No of student registered for each event',
                width: 400,
                height: 300,
                backgroundColor: '#E4E4E4',
                legend: 'none',
                vAxis: {minValue: 0}
            };
            // create the graph
            var barchart = new google.visualization.ColumnChart(document.getElementById('barchart_div'));
            barchart.draw(event_students, barchart_options);

        /********************************
        *   No of events for each month
        ******************************/ 
        // prepare the graph
        var events_month = new google.visualization.DataTable();
            events_month.addColumn('string', 'Event');
            events_month.addColumn('number', 'No Events');
            events_month.addRows(eventsMonth);

        // set graph options 
            var events_month_options = {
                title: 'No of events registered in each Month',
                width: 400,
                height: 300,
                legend: 'none',
                backgroundColor: '#E4E4E4',
                vAxis: {minValue: 0}
            };
            // create the graph
            var barchart = new google.visualization.ColumnChart(document.getElementById('events_month_graph'));
            barchart.draw(events_month, events_month_options);
      }



</script>
@endsection