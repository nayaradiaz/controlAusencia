<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\AdminUsers;

Route::view('/', 'welcome');

Route::post('/admin/users/store', [AdminUsers::class, 'store'])->name('admin.users.store');
Route::post('/admin/users/upload', [AdminUsers::class, 'uploadCsv'])->name('admin.users.upload');

// Otras rutas de tu aplicación
Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');
Route::view('profile', 'profile')->middleware('auth')->name('profile');


require __DIR__ . '/auth.php';
