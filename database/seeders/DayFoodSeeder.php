<?php

namespace Database\Seeders;

use App\Models\DayFood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DayFood::create([
            'day' => 'Lunes',
            'slug' => 'monday'
        ]);
        DayFood::create([
            'day' => 'Martes',
            'slug' => 'tuesday'
        ]);
        DayFood::create([
            'day' => 'Miercoles',
            'slug' => 'wednesday'
        ]);
        DayFood::create([
            'day' => 'Jueves',
            'slug' => 'thursday'
        ]);
        DayFood::create([
            'day' => 'Viernes',
            'slug' => 'friday'
        ]);
        DayFood::create([
            'day' => 'Sabado',
            'slug' => 'saturday'
        ]);
        DayFood::create([
            'day' => 'Domingo',
            'slug' => 'sunday'
        ]);
    }
}
