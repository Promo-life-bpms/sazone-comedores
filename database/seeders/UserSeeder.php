<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'brenda.calzada1@alsea.com.mx',
                'password' => Hash::make('BrendaC2134'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'wendy.lopez1@alsea.com.mx',
                'password' => Hash::make('WendyLopez9023'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'luis.padilla1@alsea.com.mx',
                'password' => Hash::make('LuisPadilla8923'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'sergio.torres1@alsea.com.mx',
                'password' => Hash::make('SergioTorres7842'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'cristian.hernandez1@vips.com.mx',
                'password' => Hash::make('CristianHernandez8923'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'luis.salinas@alsea.com.mx',
                'password' => Hash::make('LuisSalinas1390'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'carlos.carsolio1@alsea.com.mx',
                'password' => Hash::make('CarlosCarsolio2538'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'daniela.juarez1@alsea.com.mx',
                'password' => Hash::make('DanielaJuarez2348'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'daniel.luna1@alsea.com.mx',
                'password' => Hash::make('DanielLuna1230'),
            ],
            [
                'name' => 'brenda.calzada@alsea.com.mx',
                'email' => 'karina.velasco1@alsea.com.mx',
                'password' => Hash::make('KarinaVelasco2509'),
            ],
        ]);
    }
}
