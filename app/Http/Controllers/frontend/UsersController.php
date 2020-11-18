<?php

namespace App\Http\Controllers\frontend;

use Gate;
use App\Role;
use App\User;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\StoreUserRequest;

class UsersController extends Controller
{
    public function show($id) {
        if(Gate::allows('event_create')) {
            $events = Event::where('moderator_id', $id)->get();
        } else {
            $events = Event::whereJsonContains('attendees_ids', $id)->get();   
        }
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
        Auth::login($user, true);
        return redirect()->route('frontend.home');
    }

    public function register () {
        
        $event = Event::find(request()->event_id);
        $user = User::find(request()->user_id);
        $max_points =  DB::table('admin_rules')->whereNotNull('max_star_points')->pluck('max_star_points')->first();
        $points = $user->points_earned;
        $points += $event->points;
        if($points >= $max_points) {
            $user->save();
            $event->save();
            return redirect()->back()->with('fail' ,'Your Earned points Exceeded the Max points');
        }
        
        $user->points_earned = $points;
        $user->save();
        $attendees = $event->attendees_ids ?? [];
        array_push($attendees, request()->user_id);
        $event->attendees_ids = $attendees;
        $event->save();

        return redirect()->back()->with('success' ,'Registered Successfully'); 
    }

    public function unregister () {
        $event = Event::find(request()->event_id);
        
        //Add Star points to user
        $user = User::find(Auth::id());
        $points = $user->points_earned;
        $points -= $event->points;
        $user->points_earned = $points;
        $user->save();

        $attendees = $event->attendees_ids;
        $key = array_search(Auth::id(), $attendees);
        unset($attendees[$key]); 
        $event->attendees_ids = $attendees;
        $event->save();

        return redirect()->back()->with('success' ,'UnRegistered Successfully'); 
    }
}