@extends('layouts.app')
@section('content')
//@card_style()
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("events.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @event_form()
        </form>


    </div>
</div>
@endsection