<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'  => $this->faker->firstName,
            'last_name'   => $this->faker->lastName,
            'gender'      => $this->faker->numberBetween(1, 3),
            'email'       => $this->faker->unique()->safeEmail,
            'tel'         => '0' . $this->faker->numerify('###########'),
            'address'     => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'building'    => $this->faker->optional(0.7)->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1, 5),
            'detail'      => $this->faker->realText(20),
        ];
    }
}
