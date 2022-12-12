<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'inv_number' => Str::random(10),
            'inv_to'=>fake()->name(),
            'inv_contact_number'=>fake()->numerify('###-###-####'),
            'inv_date' => fake()->date(),
            'inv_currency' => 0,
            'inv_status' => 0,
            'inv_payment_method'=>0,
            'inv_delivery_address'=>fake()->address(),
            'created_by'=>1,
            'created_at'=>fake()->dateTime(),
            'updated_at'=>fake()->dateTime(),
        ];
    }
}
