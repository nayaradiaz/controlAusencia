<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $department = Department::first(); // El primer departamento disponible.

        // Crear el usuario Admin
        User::create([
            'name' => 'Admin',
            'surnames' => 'Administrator',
            'email' => 'admin@example.com',
            'department_id' => null, 
            'password' => Hash::make('qwerty-1234'), // Contraseña predeterminada
            'role' => 'admin',
        ]);
    }
}
