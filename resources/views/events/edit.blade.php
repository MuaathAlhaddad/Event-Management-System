@extends('layouts.app')
@section('content')
//@card_style()
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("events.update", [$event->id]) }}" 
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
@endsection