<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }

    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->getRealPath()));

        foreach ($data as $index => $row) {
            if ($index === 0) continue; // Ignorar la cabecera del archivo

            $name = $row[0] ?? null;
            $email = $row[1] ?? null;
            $password = $row[2] ?? null;

            if (!$name || !$email || !$password) {
                continue;
            }

            // Verificar si el usuario ya existe
            if (!User::where('email', $email)->exists()) {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Usuarios subidos correctamente.');
    }
}
