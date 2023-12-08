<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear factory menu con relacion a day_menu
        $menus = \App\Models\Menu::factory(10)->create();
        foreach ($menus as $menu) {
            // Genera un array con un for con el number como maximo
            $days = range(1, 6);
            $menu->daysAvailable()->attach($days);
        }
    }
}
