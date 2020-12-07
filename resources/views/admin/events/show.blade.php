@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.event.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.id') }}
                        </th>
                        <td>
                            {{ $event->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.name') }}
                        </th>
                        <td>
                            {{ $event->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Moderator
                        </th>
                        <td>
                            @php
                                $moderator = App\User::find($event->moderator_id)->first();
                            @endphp
                            {{ $moderator->first_name ?? '' }}
                            {{ $moderator->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.start_time') }}
                        </th>
                        <td>
                            {{ $event->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.end_time') }}
                        </th>
                        <td>
                            {{ $event->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.recurrence') }}
                        </th>
                        <td>
                            {{ App\Event::RECURRENCE_RADIO[$event->recurrence] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <h5>Registered Students</h5>
            @php
                $registered_users = App\User::whereIn('id', [$event->attendees_ids])->get();
            @endphp
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Gender</th>
                        <th>Kulliyyah</th>
                        <th>Points Earned</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registered_users as $user)
                    <tr>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email ?? 'Null'}}</td>
                        <td>{{$user->phone_number ?? 'Null'}}</td>
                        <td>{{$user->gender ?? 'Null'}}</td>
                        <td>{{$user->kulliyyah ?? 'Null'}}</td>
                        <td>{{$user->points_earned ?? 0}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a style="margin-top:20px; color:white; font-size:16px!important; background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection