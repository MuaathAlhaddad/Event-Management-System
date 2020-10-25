@extends('frontend.master' , ['page' => 'events_create'])
{{-- @extends('layouts.admin') --}}
@section('content')
<style>
    th {
        color: {{config('styles.frondend.colors.primary')}};
    }
    table.table th {
        width: auto;
}
    #user-profile {
        color: {{config('styles.frondend.colors.primary')}};
    }
    #user-profile-container{
        padding: 10px;
        bottom: 450px;
        text-align: center;
        border-radius: 10px;
        background: white;
    }
    .card{
        padding-top: 20px;
        align-items: center;
    }
    .form-control{
        border: 1px solid #2dc997;
    }
    .select-all, .deselect-all{
        border: 1px solid #2dc997;
        background: #2dc997;
    }
    
</style>

<section id="portfolio" class="portfolio" style="margin-top: 4rem; height: inherit; ">
    <div class="container" data-aos="fade-up">
        <div class="card p-4">
            <div  class=" display-4 pb-3" style=" color: #2dc997;">
                {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
            </div>
        
            <div class="card-body" style="border: 1px solid #2dc997; ">
                <form action="{{ route("frontend.events.update", [$event->id]) }}" 
                    method="POST" 
                    enctype="multipart/form-data" 
                    @if($event->events_count || $event->event) onsubmit="return confirm('Do you want to apply these changes to all future recurring events, too?');" @endif
                >
                    @csrf
                    @method('PUT')
                    @event_form()
                </form>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Section -->

@endsection