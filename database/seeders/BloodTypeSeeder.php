<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        BloodType::create([
            'type_name' => 'A+'
        ]);
        BloodType::create([
            'type_name' => 'A-'
        ]);
        BloodType::create([
            'type_name' => 'B+'
        ]);
        BloodType::create([
            'type_name' => 'B-'
        ]);
        BloodType::create([
            'type_name' => 'AB+'
        ]);
        BloodType::create([
            'type_name' => 'AB-'
        ]);
        BloodType::create([
            'type_name' => 'O+'
        ]);
        BloodType::create([
            'type_name' => 'O-'
        ]);
    }
}
