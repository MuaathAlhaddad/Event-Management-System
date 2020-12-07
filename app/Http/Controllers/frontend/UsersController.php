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
        
        // reterive all events this user has registered
        $pointsInSem = Event::select(DB::raw('sum(points) as points_earned'))->where('semester', '=', $event->semester)
                        ->whereJsonContains('attendees_ids', request()->user_id)
                        ->groupBy('semester')->first();
                        

        // validate that a user hasn't exceeded the max points limit
        $max_points =  DB::table('admin_rules')->whereNotNull('max_star_points')->pluck('max_star_points')->first();
        if(isset($pointsInSem)) {
            $pointsInSem->points_earned += $event->points;
            if($pointsInSem->points_earned > $max_points) {
                $user->save();
                $event->save();
                return redirect()->back()->with('fail' ,'You can not register anymore events this semester');
            }
        } else {
            if($event->points > $max_points) {
                $user->save();
                $event->save();
                return redirect()->back()->with('fail' ,'You can not register anymore events this semester');
            }
        }
        
        if(isset($pointsInSem)) {
            $user->points_earned = $pointsInSem->points_earned;
        } else {
            $user->points_earned = $event->points;
        }
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