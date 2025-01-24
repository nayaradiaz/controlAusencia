<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Profesor']);

        // Asignar roles a los usuarios
        $user = User::find(1); // Usuario con ID 1
        if ($user) {
            $user->assignRole($role1);
        }

        // Asignar el rol de "Profesor" al resto de usuarios
        $resto = User::where('id', '!=', 1)->get();
        foreach ($resto as $x) {
            $x->assignRole($role2);
        }
    }
}
