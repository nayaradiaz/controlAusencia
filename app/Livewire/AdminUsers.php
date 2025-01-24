<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminUsers extends Component
{
    public $users;

    public function mount()
    {
        // Solo los admins deberían tener acceso a este componente
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acceso denegado');
        }

        // Cargar los usuarios
        $this->users = User::all(); // Aquí puedes aplicar cualquier filtro que necesites
    }

    public function render()
    {
        return view('livewire.admin-users');
    }
}
