<?php

use App\Models\Package;
use App\Models\School;
use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            ['name' => 'برنامج الانجليزي المكثف'],
            ['name' => ' برنامج الانجليزي المكثف مع فيزا 6 أشهر'],
            ['name' => ' برنامج الانجليزي المكثف مع فيزا سنة'],
        ];
        $school = School::findOrFail(1);
        foreach ($packages as $package) {
            $package = Package::create($package);
            $package->school()->associate($school);
            $package->save();
        }
    }
}
