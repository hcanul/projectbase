<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'SuperUser']);
        $role2 = Role::create(['name' => 'Coordinador General']);

        $role3 = Role::create(['name' => 'Coordinador Urbano']);
        $role4 = Role::create(['name' => 'Seccional Urbano']);
        $role5 = Role::create(['name' => 'Lider Coordinador Urbano']);
        $role6 = Role::create(['name' => 'Activista Urbano']);

        $role7 = Role::create(['name' => 'Coordinador Rural']);
        $role8 = Role::create(['name' => 'Seccional Rural']);
        $role9 = Role::create(['name' => 'Lider Coordinador Rural']);
        $role10 = Role::create(['name' => 'Activista Rural']);
    }
}
