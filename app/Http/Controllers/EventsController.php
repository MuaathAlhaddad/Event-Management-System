<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $events = Event::withCount('events')->get();

        foreach ($events as $key => $event) {
            // Calculate Percentage
            $attendees = count( (array) $event->attendees_ids);
            $total = $event->max_no_attendees;
            $percent = $attendees/$total;
            $percentage = number_format( $percent * 100) . '%';
            // update field 
            $event->percentage = $percentage;
            $event->save();
            if((integer) rtrim($percentage, "%") == 100) {
                $event->status = true;    
            } 
            if (Carbon::now() > $event->end_time ) {
                $event->delete();
            }
        }
        return view('events.index', compact('events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $event = $request->all();
        $event["moderator_id"] = Auth::id();  
        Event::create($event);

        return redirect()->route('systemCalendar');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('event')
            ->loadCount('events');

        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('systemCalendar');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('event');

        return view('events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function deletedEvents() {
        abort_if(Gate::denies('event_access_deletedEvents'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('events.deletedEvents')->with(['deletedEvents' => Event::onlyTrashed()->get()]);
    }

    public function restore($id) {
        abort_if(Gate::denies('event_restore'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $event = Event::onlyTrashed()->where('id', $id)->first();
        $event->restore();

        return back();
    }

    public function destroy_permanently($id) {
        abort_if(Gate::denies('event_delete_permanently'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $event = Event::onlyTrashed()->where('id', $id)->first();
        $event->forceDelete();
        
        return back();
    }
}
