<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiningRoom>
 */
class DiningRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement(['open', 'closed', 'maintenance', 'pending']),
            'logo' => 'https://www.ford.mx/content/dam/Ford/website-assets/latam/mx/open-graph/2021/blog/legado/ford-blog-emblema-logo-historia-evolucion-siglo-diferencias-logotipo.jpg',
            'slug' => $this->faker->slug(),
        ];
    }
}
