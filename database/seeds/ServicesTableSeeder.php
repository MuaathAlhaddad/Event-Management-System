<?php

use App\Models\School;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = Service::create([
            'description' => 'نحن موجودون في قلب كوالالمبور بالقرب من مجمع التسوق Ampang Point مع راحة البنوك التجارية ومكتب البريد. متاجر الكتب والسوبر ماركت والمقاهي والمطاعم على مرمى حجر.',
        ]);

        $school = School::findOrFail(1);
        $service->school()->associate($school);
        $service->save();
    }
}
