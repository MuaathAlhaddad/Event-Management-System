<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            SchoolsTableSeeder::class,
            PackagesTableSeeder::class,
            CoursesTableSeeder::class,
            ReviewsTableSeeder::class,
            ServicesTableSeeder::class,
            PhotosTableSeeder::class,
            MaterialsTableSeeder::class,
            CalendarsTableSeeder::class,
            AccreditationsTableSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
        ]);
    }
}
