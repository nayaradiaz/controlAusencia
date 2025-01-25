<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear roles solo si no existen
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Profesor']);
    }
}
