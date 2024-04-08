<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DiningRoomSeed::class);
        $this->call(DayFoodSeeder::class);

        // Crear 4 roles (master-admin, super-admin ,admin, user)
        $masterAdmin = Role::create(
            [
                'name' => 'master-admin',
                'display_name' => 'Master Admin',
                'description' => 'Master Admin',
            ]
        );
        $superAdmin = Role::create(
            [
                'name' => 'super-admin',
                'display_name' => 'Super Admin',
                'description' => 'Super Admin',
            ]
        );
        $admin = Role::create(
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Admin',
            ]
        );
        $user = Role::create(
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'User',
            ]
        );

        // Crear 4 usuarios
        User::create([
            'name' => 'Master Admin',
            'email' => 'admin@master.com',
            'password' => Hash::make('password'),
        ])->attachRole($masterAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@super.com',
            'password' => Hash::make('password'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Jose.lopezg@alsea.com.mx',
            'password' => Hash::make('JoseLog123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Luis.tapia@alsea.com.mx',
            'password' => Hash::make('LuisTa123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Karina.velasco@alsea.com.mx',
            'password' => Hash::make('KarinaVe123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Daniel.luna@alsea.com.mx',
            'password' => Hash::make('DanielLu123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Jose.lopezg@alsea.com.mx',
            'password' => Hash::make('JoseLog123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Super Admin',
            'email' => 'Selene.luna@alsea.com.mx',
            'password' => Hash::make('SeleneLu123!'),
        ])->attachRole($superAdmin);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ])->attachRole($admin);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ])->attachRole($user);


        // Crear factory menu con relacion a day_menu
        // $this->call(MenuSeeder::class);
    }
}
