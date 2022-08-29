<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,

            'email' => $this->faker->email,
            'office_phone' => $this->faker->phoneNumber,

            'user_id' => function () {
                return rand(0, 1) ? UserFactory::new()->create()->id : null;
            },

            'billing_street'      => $this->faker->streetAddress,
            'billing_street_2'    => $this->faker->streetAddress,
            'billing_street_3'    => $this->faker->streetAddress,
            'billing_city'        => $this->faker->city,
            'billing_state'       => $this->faker->state,
            'billing_postal_code' => $this->faker->postcode,
            'billing_country'     => $this->faker->country,
        ];
    }
}
