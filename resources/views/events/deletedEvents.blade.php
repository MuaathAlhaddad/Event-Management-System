@extends('layouts.app')
@section('content')
//@card_style()

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.event.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover">
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
                        @foreach($deletedEvents as $event)
                        <tr data-entry-id="{{ $event->id }}" class="text-capitalize">
                            <td></td>
                            <td>{{ $event->id ?? '' }}</td>
                            <td>{{ $event->name ?? '' }}</td>
                            <td>{{ $event->start_time ?? '' }}</td>
                            <td>{{ $event->end_time ?? '' }}</td>
                            <td class="text-center">{{ App\Models\Event::RECURRENCE_RADIO[$event->recurrence] ?? '' }}</td>
                            <td>
                                <div class="progress border" style="height: 25px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{"$event->percentage"}}; padding: 4px; text-transform: uppercase; font-weight: bold;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{ $event->status ? 'Complete' : $event->percentage }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                @can('event_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('events.show', $event->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan

                                @can('event_delete_permanently')
                                <form action="{{ route('events.destroy_permanently', $event->id) }}" method="POST"
                                    onsubmit="return confirm('{{ $event->events_count || $event->event ? 'You will not be able to restore, Are you sure?' : trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-xs btn-danger"
                                        value="{{ trans('global.permanent_delete') }}">
                                </form>
                                @endcan

                                @can('event_restore')
                                <a class="btn btn-xs btn-warning text-white" href="{{ route('events.restore', $event->id) }}">
                                    {{ trans('global.restore') }}
                                </a>
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