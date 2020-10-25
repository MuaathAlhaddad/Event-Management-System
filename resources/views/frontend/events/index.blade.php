@extends('frontend.master' , ['page' => 'events_index'])
@section('content')
<section id="portfolio" class="portfolio" style="margin-top: 4rem;">
    <div class="container" data-aos="fade-up">
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
      @endif
      <div class="section-header">
        <h3 class="section-title">Events</h3>
        <p class="section-description">Get ready and Register in any avaiable events</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-10 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach (App\Event::CATEGORIES as $category)
                <li data-filter=".filter-{{$category}}">{{$category}}</li>
            @endforeach 
          </ul>
        </div>
        
        <div class="col-lg-2 float-right">
          <ul id="portfolio-flters" class="float-right ">
            @can('event_create')
            <a href="{{route('frontend.events.create')}}"> Add Event </a>
            @endcan
          </ul>
        </div>
      </div>
     
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @if ($events->count() > 0)
        @foreach ($events as $event)    
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$event->category}}">
          
          <img src="{{ asset('storage/events/'.$event->profile) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4 class="d-inline-block ">{{$event->name}}
            </h4>
            @cannot('event_create')
              @if (!$event->status && !in_array(Auth::id(), (array)$event->attendees_ids))
                <form action="{{ route('frontend.users.register')}}" method="post">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <button class="preview-link"
                        style="background: transparent;
                      box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent;" title="Register">
                        <i class="bx bx-plus"></i>
                    </button>
                </form>
              @endif 
            @endcannot

            <a href="{{ route('frontend.events.show', $event->id )}}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            <p>{{$event->desc}}</p>
            <p class="mt-3"> <i class="fa fa-calendar pr-2"></i> {{$event->start_time}}</p>
            <p> <i class="fa fa-map-marker pr-3"></i> {{$event->location}}</p>
          </div>
        </div>
        @endforeach
        @else
          <div class="m-auto p-4">
            <h4 >No Events To display</h4>
          </div>
        @endif
      </div>

    </div>
  </section><!-- End Portfolio Section -->

@endsection