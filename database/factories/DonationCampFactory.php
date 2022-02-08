<?php

namespace Database\Factories;

use App\Models\DonationCamp;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationCampFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DonationCamp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'branch_name' => $this->faker->company(),
            'branch_address' => $this->faker->address(),
            'branch_phoneNo' => $this->faker->phoneNumber(),
            'opening_hours' => $this->faker->randomElement($array = ['Mon-Fri: 8:00am-4:00pm', 'Friday: 10:00am-2:30pm', 'Saturdays ONLY: 9:00am-3:00pm', 'Fri: 8:00am-2:00pm', 'Mon-Fri: 8:30am-3:00pm'])
        ];
    }
}
