@extends('frontend.master' , ['page' => 'events_show'])
@section('content')
<style>
    th {
        color: {{config('styles.colors.primary')}};
    }
    table.table th {
        width: auto;
}
    #user-profile {
        color: {{config('styles.colors.primary')}};
    }
    #user-profile-container{
        padding: 10px;
        bottom: 450px;
        text-align: center;
        border-radius: 10px;
        background: white;
    }
    .card{
        margin-top: 100px;
        padding-top: 100px;
        height: 550px;
        align-items: center;
    }
</style>


<section id="portfolio" class="portfolio" style="margin-top: 4rem; height: 700px; ">
    <div class="container" data-aos="fade-up">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="card">
            <div class="position-absolute" id="user-profile-container">
                <i class="fas fa-user fa-10x" id="user-profile"></i>
            </div>
        
            <div class="card-body" style="position: absolute;
            top: 80px;
            margin-top: 30px;
            width: 500px;">
                <div class="mb-2">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-item nav-link" id="more-info-tab" data-toggle="tab" href="#more-info"
                                role="tab" aria-controls="more-info" aria-selected="false">More Info</a>
                            <a class="nav-item nav-link" id="events-registered-tab" data-toggle="tab" href="#events-registered"
                                role="tab" aria-controls="events-registered" aria-selected="false">Events Registered</a>
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
                                            Role
                                        </th>
                                        <td>
                                            @foreach($user->roles as $id => $roles)
                                            <span class="label label-info label-many badge badge-pill badge-success">  {{ $roles->title }}</span>
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
                                  <span class="badge badge-primary badge-pill">{{$event->start_time}}</span>
                                  <form action=" {{route('frontend.users.unregister')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="event_id" value="{{$event->id}}">
                                      <button class="btn btn-sm btn-outline-danger">Unregister</button>
                                  </form>
                                </li>
                                @endforeach
                            </ul>
                            @else
                                <h6 class="p-4">No Events Registered Yet <i class="fas fa-smile-o"></i> </h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section><!-- End Portfolio Section -->

@endsection