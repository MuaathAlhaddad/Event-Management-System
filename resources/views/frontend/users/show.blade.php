@extends('frontend.master' , ['page' => 'events_show'])
@section('content')
<style>
    th {
        color: {
                {
                config('styles.colors.primary')
            }
        }

        ;
    }

    table.table th {
        width: auto;
    }

    #user-profile {
        color: {
                {
                config('styles.colors.primary')
            }
        }

        ;
    }

    #user-profile-container {
        padding: 10px;
        bottom: 450px;
        text-align: center;
        border-radius: 10px;
        background: white;
    }

    .card {
        margin-top: 100px;
        height: 550px;
        align-items: center;
    }

    .profile-pic {
        max-width: 200px;
        max-height: 200px;
        display: block;
    }

    .file-upload {
        display: none;
    }

    .circle {
        border-radius: 1000px !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 1px solid rgba(0,0,0,.125);
        background-color: white;
        position: absolute;
        top: -50px;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .p-image {
        position: absolute;
        top: 65px;
        right: 435;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
</style>


<section id="portfolio" class="portfolio" style="margin-top: 4rem;">
    <div class="container" data-aos="fade-up">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <di class="card">
                    <!-- profile -->
                          <div class="circle">
                            <!-- User Profile Image -->
                            @if(isset($user->profile) && !empty($user->profile))
                                <img class="profile-pic" src="{{$user->profile ?? ''}}">
                            @else
                                <img class="profile-pic" src="">
                                <!-- Default Image -->
                                <i class="fa fa-user fa-5x" style="position: absolute;top: 20px;left: 35px;"></i>
                            @endisset
                          </div>
                          <div class="p-image">
                            <i class="fa fa-camera upload-button"></i>
                             <input class="file-upload" type="file" accept="image/*"/>
                          </div>
            <div class="card-body" style="
                        margin-top: 100px;
                        width: 700px;">
                    <div class="mb-2">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" style=" color:purple!important; margin-right:15px!important;" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-item nav-link" style=" color:purple!important; margin-right:15px!important;" id="more-info-tab" data-toggle="tab" href="#more-info"
                                role="tab" aria-controls="more-info" aria-selected="false">More Info</a>
                                @can('event_create')
                                    <a class="nav-item nav-link" style=" color:purple!important;margin-right:20px!important;" id="events-created-tab" data-toggle="tab" href="#events-created" role="tab" aria-controls="events-created" aria-selected="false">Events Created</a>
                                @else
                                <a class="nav-item nav-link" style=" color:purple!important;"  id="events-registered-tab" data-toggle="tab" href="#events-registered"
                                    role="tab" aria-controls="events-registered" aria-selected="false">Events Registered</a>
                                
                                @endcan
                                <a class="nav-item nav-link" style=" color:purple!important;"  id="events-history-tab" data-toggle="tab" href="#history"
                                role="tab" aria-controls="events-history" aria-selected="false">History</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    

                  
                        {{-- profile Tab --}}
                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.first_name') }}
                                        </th>
                                        <td>
                                            {{ $user->first_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.last_name') }}
                                        </th>
                                        <td>
                                            {{ $user->last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.phone_number') }}
                                        </th>
                                        <td>
                                            {{ $user->phone_number }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        
                        {{-- More info Tab --}}
                        <div class="tab-pane fade" id="more-info" role="tabpanel" aria-labelledby="more-info-tab">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.gender') }}
                                        </th>
                                        <td>
                                            {{ $user->gender }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.kulliyyah') }}
                                        </th>
                                        <td>
                                            {{ $user->kulliyyah }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.points_earned') }}
                                        </th>
                                        <td>
                                            {{ $user->points_earned ??  'No Points Earned Yet' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Remaining Points
                                        </th>
                                        <td>
                                            {{ $remaining_points ??  'Not Found' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Role
                                        </th>
                                        <td>
                                            @foreach($user->roles as $id => $roles)
                                            <span class="label label-info label-many badge badge-pill badge-success" style="background-color:purple;">  {{ $roles->title }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.created_at') }}
                                        </th>
                                        <td>
                                            {{ $user->created_at  }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Events Created --}}
                        @can('event_create')
                            <div class="tab-pane fade" id="events-created" role="tabpanel" aria-labelledby="events-created-tab">
                                @if($events->count() > 0)
                                <ul class="list-group">
                                    <li class=" mt-3 list-group-item d-flex justify-content-between align-items-center border-0">
                                        Name
                                        <i class="fa fa-map-marker pr-3"></i>
                                        <i class="fa fa-calendar pr-2"></i>
                                        <i ></i>
                                        @can('event_create')
                                            <i ></i>
                                            <i ></i>
                                            <i ></i>
                                        @else
                                        <i class="fa  fa-user-times"></i>
                                        @endcan
                                    </li>
                                    @foreach ($events as $event)
                                    <li class=" mt-3 list-group-item d-flex justify-content-between align-items-center border shadow">
                                    {{ucfirst($event->name)}}
                                    <small>{{$event->location}}</small>
                                    <span class="badge badge-primary badge-pill" style="background-color: #F8CEEC; color:black;border-color:purple;">{{$event->start_time}}</span>
                                    @can('event_show')
                                    <a class="btn btn-xs btn-primary" style="background-color:#BA55D3!important; border-color:#BA55D3; color:white!important; margin: 5px!important;"
                                        href="{{ route('frontend.events.show', $event->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    @endcan

                                    @can('event_edit')
                                    <a class="btn btn-xs btn-warning text-white" style="background-color:#9400D3!important; border-color:#9400D3; color:white!important;margin: 5px!important;"
                                        href="{{ route('frontend.events.edit', $event->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan

                                    @can('event_delete')
                                    <form action="{{ route('frontend.events.destroy', $event->id) }}" method="POST"
                                        onsubmit="return confirm('{{ $event->events_count || $event->event ? 'Do you want to delete future recurring events, too?' : trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" style="background-color:#663399!important; border-color:#663399; color:white!important; margin: 5px!important;"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                    @endcan
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                    @can('event_delete')
                                    <h6 class="p-4">No Events Created Yet <i class="fas fa-smile-o"></i> </h6>
                                    @else
                                    <h6 class="p-4">No Events Registered Yet <i class="fas fa-smile-o"></i> </h6>
                                    @endcan
                                @endif
                            </div>   
                        @else
                            {{-- Events Registered --}}
                            <div class="tab-pane fade" id="events-registered" role="tabpanel" aria-labelledby="events-registered-tab">
                                @if($events->count() > 0)
                                <ul class="list-group">
                                    <li class=" mt-3 list-group-item d-flex justify-content-between align-items-center border-0">
                                        Name
                                        <i class="fa fa-map-marker pr-3"></i>
                                        <i class="fa fa-calendar pr-2"></i>
                                        <i class="fa fa-user-times"></i>
                                    </li>
                                    @foreach ($events as $event)
                                    <li class=" mt-3 list-group-item d-flex justify-content-between align-items-center border shadow">
                                    {{ucfirst($event->name)}}
                                    <small>{{$event->location}}</small>
                                    <span class="badge badge-primary badge-pill" style="background-color: #F8CEEC; color:black;border-color:purple;">{{$event->start_time}}</span>
                                    <form action=" {{route('frontend.users.unregister')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                        <button class="btn btn-sm btn-outline-danger" style="color:purple;border-color:purple;">Unregister</button>
                                    </form>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                    <h6 class="p-4">No Events Registered Yet <i class="fas fa-smile-o"></i> </h6>
                                @endif
                            </div>
                        @endcan
                        {{-- History  --}}
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                            <div id="events_month_graph" {{-- style="border: 1px solid #ccc" --}}></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section><!-- End Portfolio Section -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript">
     $(document).ready(function () {

         var readURL = function (input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();

                 reader.onload = function (e) {
                     var avator = e.target.result;
                     var user_id = <?php echo $user->id; ?>;
                     
                     //set img src
                     $('.fa-user').remove();
                     $('.profile-pic').attr('src', avator);

                    //  send Ajax request to store the profile
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('setUserProfile')}}",
                        data: {
                            profile: avator,
                            user_id: user_id,
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            alert(data.msg);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    })
                 }

                 reader.readAsDataURL(input.files[0]);
             }
         }


         $(".file-upload").on('change', function () {
             readURL(this);
         });

         $(".upload-button").on('click', function () {
             $(".file-upload").click();
         });
     });
   
        // No of events of each month
        var EventsMonth = {!! json_encode($EventsMonth) !!};
        var eventsMonth = EventsMonth.map(event => [event.month, event.no_events]); 
         // Load Charts and the corechart and barchart packages.
         google.charts.load('current', {'packages':['corechart']});

        // Draw the pie chart and bar chart when Charts is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

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
                    title: 'No of events in each Month',
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