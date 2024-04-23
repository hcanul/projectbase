<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssingRoleTousersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permiso = Permission::create(['name' => 'ver todo']); //Jaime
        $permiso1 = Permission::create(['name' => 'ver administrador']);
        $permiso2 = Permission::create(['name' => 'ver capturista']);

        $role = Role::where('name', 'superuser')->first();
        $role->givePermissionTo($permiso);
        $role->givePermissionTo($permiso1);
        $role->givePermissionTo($permiso2);
        $users = User::where('profile', '=', 'superuser')->get();
        foreach ($users as  $user)
        {
            $user->assignRole($role);
        }



        $role1 = Role::where('name', 'administrador')->first();
        $role1->givePermissionTo($permiso1);
        $users1 = User::where('profile', '=', 'administrador')->get();
        foreach ($users1 as  $user)
        {
            $user->assignRole($role1);
        }

        $role2 = Role::where('name', 'capturista')->first();
        $role2->givePermissionTo($permiso2);
        $users2 = User::where('profile', '=', 'capturista')->get();
        foreach ($users2 as $user) {
            $user->assignRole($role2);
        }

    }
}
