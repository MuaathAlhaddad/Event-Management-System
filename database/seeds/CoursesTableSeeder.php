<?php

use App\Models\Course;
use App\Models\Package;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name' => 'شهر واحد',
                'price' => 1900,
                'duration' => 1,
                'start_date' => date('Y-m-d'),
                'description' => 'لا يوجد وصف', 
            ],
            [
                'name' => 'شهرين',
                'price' => 3550,
                'duration' => 2,
                'start_date' => date('Y-m-d'),
                'description' => 'لا يوجد وصف', 
            ],
            [
                'name' => '3 أشهر',
                'price' => 3550,
                'duration' => 3,
                'start_date' => date('Y-m-d'),
                'description' => 'لا يوجد وصف', 
            ],
        ];
        $package = Package::findOrFail(1);
        foreach ($courses as $course) {
            $course = Course::create($course);
            $course->package()->associate($package);
            $course->save();
        }

    }
}
