<?php

namespace Database\Seeders;

use App\Models\DinningRoom;
use Illuminate\Database\Seeder;

class DinningRoomSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DinningRoom::factory(10)->create();
    }
}
