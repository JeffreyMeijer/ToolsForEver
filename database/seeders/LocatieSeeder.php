<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Locatie::factory(10)->create();
    }
}
