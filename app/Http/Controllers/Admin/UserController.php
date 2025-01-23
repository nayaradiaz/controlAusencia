<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|exists:departments,id',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('users.create')->with('success', 'Usuario creado correctamente');
    }
    public function uploadCSV(Request $request)
    {
        // Validar el archivo CSV
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:10240', // máximo 10MB
        ]);

        // Cargar el archivo CSV
        $file = $request->file('csv_file');
        
        // Leer el archivo CSV
        $csvData = array_map('str_getcsv', file($file));

        // Validación y procesamiento de los datos CSV
        foreach ($csvData as $index => $row) {
            if ($index === 0) continue;  // Saltar la primera fila (encabezados)

            $data = [
                'name' => $row[0],
                'surnames' => $row[1],
                'email' => $row[2],
                'department_id' => Department::where('name', $row[3])->first()->id, // Obtiene el ID del departamento
                'alias' => $row[4],
            ];

            // Verifica si el usuario ya existe
            if (!User::where('email', $data['email'])->exists()) {
                // Si el usuario no existe, crea uno nuevo
                User::create([
                    'name' => $data['name'],
                    'surnames' => $data['surnames'],
                    'email' => $data['email'],
                    'department_id' => $data['department_id'],
                    'alias' => $data['alias'],
                    'password' => Hash::make(str_random(10)),  // Asigna una contraseña aleatoria
                ]);
            }
        }

        return back()->with('success', 'Usuarios registrados correctamente');
    }

}
