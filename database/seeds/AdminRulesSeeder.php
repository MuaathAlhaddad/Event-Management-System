<?php

use Illuminate\Database\Seeder;

class AdminRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_rules')->insert([
            'max_star_points' => 5
        ]);
    }
}
