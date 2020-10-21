@extends('frontend.master' , ['page' => 'events_show'])
@section('content')
<section id="portfolio" class="portfolio" style="margin-top: 4rem; height: 700px; ">
    <div class="container" data-aos="fade-up">
      
      <div class="section-header">
        <h3 class="section-title mb-5">Event Details</h3>
      </div>

      <div class="portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @if (isset($event))    
        <div class="card shadow">
          <div class="card-body section-header">
              <h5 class="card-title section-title" style="padding: 10px; color: {{config('styles.frontend.colors.primary')}}">{{$event->name}}</h5>
                  <table class="table table-borderless">
                      <tr>
                          <th>Category</th>
                          <td>{{$event->category}}</td>
                      </tr>
                      <tr>
                          <th>Moderator</th>
                          <td>
                              @php
                              $moderator = App\User::find($event->moderator_id);
                              @endphp
                              {{ucfirst($moderator->first_name)}} {{ucfirst($moderator->last_name)}}
                          </td>
                      </tr>
                      <tr>
                          <th>Points</th>
                          <td>{{$event->points}}</td>
                      </tr>
                      <tr>
                          <th>Status</th>
                          <td>
                              <div class="progress border" style="height: 25px;">
                                  <div class="progress-bar bg-success" role="progressbar"
                                      style="width: {{"$event->percentage"}}; padding: 4px; text-transform: uppercase; font-weight: bold;"
                                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                      {{ $event->status ? 'Complete' : $event->percentage }}
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <th>Recurrence</th>
                          <td>{{ ucfirst($event->recurrence)}}</td>
                      </tr>
                      <tr>
                          <th>Description</th>
                          <td class=" text-justify">{{ucfirst($event->desc)}}</td>
                      </tr>
                  </table>
              <p class="card-text">
                  <small class="text-muted">
                      <i class="fa fa-calendar pr-2"></i> {{$event->start_time}} - {{$event->end_time}} <br>
                      <i class="fa fa-map-marker pr-3"></i> {{$event->location}}
                  </small>
              </p>
          </div>
          @if (in_array(Auth::id(), $event->attendees_ids))
            <div class="card-footer text-center" style="border: 1px solid {{config('styles.frontend.colors.primary')}}; color: {{config('styles.frontend.colors.primary')}}">
                You are Registered in this Event
            </div>
          @else    
            <form action="{{route('frontend.users.register')}}" method="post">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="card-footer text-center">
                    <button class=" btn" style="border: 1px solid {{config('styles.frontend.colors.primary')}}; color: {{config('styles.frontend.colors.primary')}}">Register</button>
                </div>
            </form>
          @endif
          
        </div>
        @endif
      </div>
    </div>
  </section><!-- End Portfolio Section -->

@endsection