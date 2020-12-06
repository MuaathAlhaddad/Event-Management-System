<?php

namespace App\Http\Controllers\Admin;

use App\Event;

class HomeController
{
    public function dashboard()
    {
        $eventsRegisteredStudents = Event::selectRaw("name, JSON_LENGTH(attendees_ids) no_students")->get()->toArray();
        
        //get no of events for each staff 
        $staffEvents = Event::selectRaw("CONCAT(users.first_name, ' ', users.last_name) AS staff_name, COUNT(*) no_events")
                                    ->join('users', 'events.moderator_id', '=', 'users.id')
                                    ->groupBy('events.moderator_id')
                                    ->get()->toArray();

        //get no of events for each month 
        $EventsMonth = Event::selectRaw("DATE_FORMAT(created_at, '%b %Y') as month, COUNT(*) no_events")
                        ->groupBy('created_at')
                        ->get()->toArray();


        // dd($eventsRegisteredStudents)
        return view('admin.dashboard', 
                    [
                        'eventsRegisteredStudents' => $eventsRegisteredStudents,
                        'staffEvents'              => $staffEvents,
                        'EventsMonth'          => $EventsMonth
                    ]);
    }
}
