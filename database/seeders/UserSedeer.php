<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hugo Paulino Canul Echazarreta',
            'email' => 'cyber.frenetic@gmail.com',
            'password' => bcrypt('ha260182ha'),
            'profile' => 'SuperUser',
            'status' => 'Active'
        ]);
        User::create([
            'name' => 'Laura Alvarez Choc',
            'email' => 'laura.2594@hotmail.com',
            'password' => bcrypt('laura2594'),
            'profile' => 'SuperUser',
            'status' => 'Active'
        ]);
        User::create([
            'name' => 'Diana Alvarez Choc',
            'email' => 'diana.anutricion@gmail.com',
            'password' => bcrypt('diana2594'),
            'profile' => 'SuperUser',
            'status' => 'Active'
        ]);
        User::create([
            'name' => 'Angel Missael Panti Trujillo',
            'email' => 'missaeltrujillo0@gmail.com',
            'password' => bcrypt('282221mtru'),
            'profile' => 'SuperUser',
            'status' => 'Active'
        ]);
    }
}
