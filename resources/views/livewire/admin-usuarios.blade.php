@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Administrar Usuarios</h1>

    @if(auth()->user()->role === 'admin')
    <!-- Registro Individual -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Registrar Usuario Individualmente</h2>
        <form method="POST" action="{{ route('admin.usuarios.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Registrar Usuario
                </button>
            </div>
        </form>
    </div>

    <!-- Subida de Archivo CSV -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Subir Usuarios con Archivo CSV</h2>
        <form method="POST" action="{{ route('admin.usuarios.upload') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="csv_file" class="block text-sm font-medium text-gray-700">Archivo CSV</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Subir CSV
                </button>
            </div>
        </form>
    </div>
    @else
    <!-- Mensaje de Acceso Restringido -->
    <div class="bg-red-100 text-red-600 p-4 rounded-lg">
        <p>No tienes acceso a esta página.</p>
    </div>
    @endif
</div>
@endsection
