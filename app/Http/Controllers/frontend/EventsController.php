<?php

namespace App\Http\Controllers\frontend;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreEventRequest;
use App\Http\Requests\Frontend\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index() {
        return view('frontend.events.index', ['events' => Event::orderBy('created_at', 'desc')->get()]);
    }

    public function show(Event $event) {
        $event->load('event');
        return view('frontend.events.show', compact('event'));
    }

    public function create()
    {
        return view('frontend.events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $event = $request->all();
        $path = $request->file('profile')->store('public/events');
        $profile = basename($path);
        $event["profile"] = $profile; 
        $event["moderator_id"] = Auth::id();  
        
        Event::create($event);
        return redirect()->route('frontend.events.index');
    }

    public function edit(Event $event)
    {
        $event->load('event')
            ->loadCount('events');

        return view('frontend.events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('frontend.users.show', Auth::id());
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back();
    }
}