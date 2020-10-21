<?php

namespace App\Http\Controllers\frontend;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {
        return view('frontend.events.index', ['events' => Event::orderBy('created_at', 'desc')->get()]);
    }

    public function show($id) {
        return view('frontend.events.show', ['event' => Event::find($id)]);
    }
}