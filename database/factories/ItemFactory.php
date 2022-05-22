<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->text(10),
            'description' => $this->faker->paragraph(2),
            'image' => $this->faker->imageUrl('1788', '2070'),
            'price' => $this->faker->randomDigit(),
            'approved_at' => now(),
        ];
    }

    public function approved()
    {
        //
    }
}
