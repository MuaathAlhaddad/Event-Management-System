<?php

use App\Models\School;
use App\Models\Calendar;
use Illuminate\Database\Seeder;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendars = [
            [
                'title' => 'Academic Calendar',
                'year' => '2021',
                'academic_event' => json_encode([
                    [
                        'description' => 'lecturers',
                        'start' => date('Y-m-d', strtotime('+3 months')),
                        'end' => date('Y-m-d', strtotime('+6 months')),
                        'period' => '3 months',
                    ],
                    [
                        'description' => 'Mid-Break',
                        'start' => date('Y-m-d', strtotime('+9 months')),
                        'end' => date('Y-m-d', strtotime('+11 months')),
                        'period' => '2 months',
                    ],
                ]),
                'notes' => json_encode([
                    [
                        'title' => 'Malaysia Day',
                        'date'  => date('Y-m-d'),
                    ],
                    [
                        'title' => 'Maulidur Rasul',
                        'date'  => date('Y-m-d'),
                    ],
                ]),
                
            ],
        ];

        $school = School::findOrFail(1);
        foreach ($calendars as $key => $value) {
            $calendar = Calendar::create($value);
            $calendar->school()->associate($school);
            $calendar->save();
        }

    }
}
