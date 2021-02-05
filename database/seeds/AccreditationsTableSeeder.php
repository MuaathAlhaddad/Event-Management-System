<?php

use App\Models\Accreditation;
use Illuminate\Database\Seeder;

class AccreditationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accreditations = [
            [
                'name' => 'معتمد من وزارة التعليم الماليزية',
                'country' => 'Malaysia',
            ],
            [
                'name' => 'وزارة الخارجية الماليزية',
                'country' => 'Malaysia',
            ],
            [
                'name' => 'الملحقية الثقافية السعودية',
                'country' => 'Malaysia',
            ],
        ];
        foreach ($accreditations as $key => $value) {
            /** Create the users */
            $accreditation = Accreditation::create($value);

            /** Setup the reltions */
            $accreditation->schools()->sync(1);
            $accreditation->save();
        }
    }
}
