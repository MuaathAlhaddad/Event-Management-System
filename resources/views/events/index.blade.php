@extends('layouts.app')
@section('content')
@can('event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12 ">
            <a class="btn btn-success text-capitalize font-weight-bold" href="{{ route("events.create") }}">
                <i class="fas fa-plus mr-2"></i> {{ trans('global.add') }} {{ trans('cruds.event.title_singular') }}
            </a>
        </div>
    </div>
@endcan
//@card_style()
<div class="card">
    <div class="card-header">
        <span class=" text-uppercase font-weight-bold" >
            {{ trans('cruds.event.title_singular') }} {{ trans('global.list') }}
        </span> 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered text-center table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.event.fields.id') }}</th>
                        <th>{{ trans('cruds.event.fields.name') }}</th>
                        <th>{{ trans('cruds.event.fields.start_time') }}</th>
                        <th>{{ trans('cruds.event.fields.end_time') }}</th>
                        <th>{{ trans('cruds.event.fields.recurrence') }}</th>
                        <th>{{ trans('cruds.event.fields.status') }}</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $key => $event)
                        <tr data-entry-id="{{ $event->id }}" class="text-capitalize">
                            <td></td>
                            <td>{{ $event->id ?? '' }}</td>
                            <td>{{ $event->name ?? '' }}</td>
                            <td>{{ $event->start_time ?? '' }}</td>
                            <td>{{ $event->end_time ?? '' }}</td>
                            <td class="text-center">{{ App\Models\Event::RECURRENCE_RADIO[$event->recurrence] ?? '' }}</td>
                            <td>
                                <div class="progress border" style="height: 25px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{"$event->percentage"}}; padding: 4px; text-transform: uppercase; font-weight: bold;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                          {{ $event->status ? 'Complete' : $event->percentage }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-capitalize">
                                @can('event_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('events.show', $event->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('event_edit')
                                    <a class="btn btn-xs btn-warning text-white" href="{{ route('events.edit', $event->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('event_delete')
                                    <form action="{{ route('events.destroy', $event->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('{{ $event->events_count || $event->event ? 'Do you want to delete future recurring events, too?' : trans('global.areYouSure') }}');" style="display: inline-block;"
                                    >
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@datatablescript(['para' => ['delete' => 'event_delete', 'route' => "events/destroy", 'class' => '.datatable-Event:not(.ajaxTable)']])
