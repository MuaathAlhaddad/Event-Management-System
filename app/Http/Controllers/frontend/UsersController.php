<?php

namespace App\Http\Controllers\frontend;

use App\Event;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index() {
        return view('frontend.users.index', ['users' => Event::orderBy('created_at', 'desc')->get()]);
    }

    public function show($id) {
        $events = Event::whereJsonContains('attendees_ids', $id)->get();
        
        return view('frontend.users.show', ['user' => User::find($id), 'events' => $events]);
    }
    
    public function create() {
        $roles = Role::all()->pluck('title', 'id');

        return view('frontend.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        dd('ready to be redirected');
        return view(route('frondend.home'));
    }

    public function register () {
        
        $event = Event::find(request()->event_id);
        $attendees = $event->attendees_ids;
        array_push($attendees, request()->user_id);
        $event->attendees_ids = $attendees;
        $event->save();

        return redirect()->back()->with('success' ,'Registered Successfully'); 
    }

    public function unregister () {
        $event = Event::find(request()->event_id);
        $attendees = $event->attendees_ids;
        $key = array_search(Auth::id(), $attendees);
        unset($attendees[$key]);

        array_push($attendees, request()->user_id);
        $event->attendees_ids = $attendees;
        $event->save();

        return redirect()->back()->with('success' ,'UnRegistered Successfully'); 
    }
}