<?php

namespace Database\Seeders;

use App\Models\DiningRoom;
use Illuminate\Database\Seeder;

class DiningRoomSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiningRoom::factory(10)->create();
    }
}
