<?php

use App\Models\School;
use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = Material::create([
            'name' => 'فيديو تسويقي',
            'item' => 'https://youtu.be/4hpWOXswkQA',
        ]);

        $school = School::findOrFail(1);
        $material->school()->associate($school);
        $material->save();
    }
}
