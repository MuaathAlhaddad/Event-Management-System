<?php

use App\Models\User;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'location'              => '1, Jalan Selaman 1, Taman Dato Ahmad Razali, 68000 Ampang, Selangor',
                'registration_fee'      => 500,
                'curriculum'            => 'المنهـج البريطاني',
                'telephone'             => '+60340321682',
                'fax'                   => '+60340321682',
                'student_nationalities' => json_encode(['yemen' => 5, 'malaysia' => 10]),
                'no_student_class'      => json_encode(['from' => 5, 'to' => 10]),
                'published'             => false,
                'website'               => 'https://viacademy.com',
                'social_media'          => json_encode(['facebook' => 'www.facebook.com/viacademy', 'twitter' => 'www.twitter.com/viacademy']),
                'application_link'      => 'https://viacademy.com/how-to-apply/',
            ],
            [
                'location'              => 'Address: Wisma Bukit Bintang, 3.01, 3rd Floor, Bukit Bintang St, 50480 Kuala Lumpur',
                'registration_fee'      => 300,
                'curriculum'            => 'المنهـج البريطاني',
                'telephone'             => '+60340321682',
                'fax'                   => '+60340321682',
                'student_nationalities' => json_encode(['Saudi' => 7, 'Qater' => 12]),
                'no_student_class'      => json_encode(['from' => 10, 'to' => 15]),
                'published'             => false,
                'website'               => 'http://elcmy.edu.my/',
                'social_media'          => json_encode(['facebook' => 'www.facebook.com/elcmy', 'twitter' => 'www.twitter.com/elcmy']),
                'application_link'      => 'http://elcmy.edu.my/how-to-apply/',
            ],
        ];

        foreach ($schools as $key => $data) {
            $school = School::create($data);
            if($key == 0) {
                $school->user()->associate(User::findOrFail(11));
                $school->save();
            } else{
                $school->user()->associate(User::findOrFail(12));
                $school->save();
            }
        }
    }
}
