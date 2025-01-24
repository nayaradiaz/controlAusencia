<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminUserController;

Route::view('/', 'welcome');

// Ruta para acceder a la vista de administrar usuarios solo si el usuario tiene el rol 'admin'
Route::middleware('auth')->get('/admin/usuarios', function () {
    // Verificar si el usuario autenticado es un administrador
    if (auth()->user()->role !== 'admin') {
        return redirect('/dashboard');  // Redirigir al dashboard si no es admin
    }

    // Si es admin, muestra la vista correspondiente
    return view('admin.usuarios.index');
})->name('admin.usuarios.index');

// Otras rutas de tu aplicación
Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');
Route::view('profile', 'profile')->middleware('auth')->name('profile');


require __DIR__ . '/auth.php';
