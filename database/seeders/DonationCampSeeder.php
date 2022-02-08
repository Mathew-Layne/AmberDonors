<?php

namespace Database\Seeders;

use App\Models\DonationCamp;
use Illuminate\Database\Seeder;

class DonationCampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationCamp::factory(5)->create();
    }
}
