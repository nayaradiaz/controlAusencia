<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Para cargar archivos
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUsers extends Component
{
    use WithFileUploads; // Permitir carga de archivos

    public $csv_file; // Variable para almacenar el archivo CSV
    public $name;
    public $surnames;
    public $email;
    public $password;

    public function registerUser()
    {
        // Validación
        $this->validate([
            'name' => 'required|string|max:255',
            'surnames' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $this->name,
            'surnames' => $this->surnames,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Asignar el rol
        $role = Role::findByName('Profesor');
        $user->assignRole($role);

        // Notificar al usuario que se registró con éxito
        session()->flash('success', 'Usuario registrado correctamente.');
    }

    public function render()
    {
        return view('livewire.admin-users');
    }

    // Función para manejar la carga de CSV
    public function uploadCsv()
    {
        $this->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $path = $this->csv_file->getRealPath();
        $data = array_map('str_getcsv', file($path)); // Leer el archivo CSV
        $header = array_shift($data); // Obtener el encabezado del archivo

        foreach ($data as $row) {
            $rowData = array_combine($header, $row); // Combinar los encabezados con los datos

            // Verificar si el usuario ya existe
            $user = User::where('email', $rowData['email'])->first();
            if (!$user) {
                $user = User::create([
                    'name' => $rowData['name'],
                    'surnames' => $rowData['surnames'],
                    'email' => $rowData['email'],
                    'password' => Hash::make($rowData['password']),
                ]);

                // Asignar rol de Profesor
                $role = Role::where('name', 'Profesor')->first();
                if ($role) {
                    $user->assignRole($role);
                }
            }
        }

        session()->flash('success', 'Archivo CSV procesado correctamente.');
    }
}
