<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tiempo = [
            'desayuno',
            'comida',
            'cena'
        ];

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'dining_room_id' => $this->faker->numberBetween(1, 10),
            'time' => $tiempo[$this->faker->numberBetween(0, 2)],
            'image' => $this->faker->imageUrl(),
        ];
    }
}
