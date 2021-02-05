<?php

use App\Models\Course;
use App\Models\Review;
use App\Models\School;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create School Review
        $review = Review::create([
            'text'  => 'ممتاز جدا',
            'stars' => 5,
        ]);
        $school = School::findOrFail(1);
        $review->school()->associate($school);
        $review->save();

        // Create Course Review
        $review = Review::create([
            'text'  => 'لا بأس',
            'stars' => 3,
        ]);
        $course = Course::findOrFail(1);
        $review->course()->associate($course);
        $review->save();
    }
}
