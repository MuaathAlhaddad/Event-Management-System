<?php

use App\Models\Photo;
use App\Models\School;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = [
            ['src' => 'http://lorempixel.com/400/200/animals/'],
            ['src' => 'http://lorempixel.com/400/200/abstract/'],
            ['src' => 'http://lorempixel.com/400/200/food/'],
            ['src' => 'http://lorempixel.com/400/200/cats/'],
            ['src' => 'http://lorempixel.com/400/200/city/'],
            ['src' => 'http://lorempixel.com/400/200/people/', 'thumbnail' => true],
            ['src' => 'http://lorempixel.com/400/200/transport/'],
        ];

        $school = School::findOrFail(1);
        foreach ($photos as $key => $value) {
            $photo = Photo::create($value);
            $photo->school()->associate($school);
            $photo->save();
        }
    }
}
