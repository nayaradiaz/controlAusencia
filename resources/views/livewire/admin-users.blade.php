<div class="container">
    <h2>Registro Individual de Profesores</h2>

    <!-- Formulario de registro individual -->
    <form wire:submit.prevent="registerUser">
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" wire:model="name" required>
        </div>
        <div>
            <label for="surnames">Apellidos:</label>
            <input type="text" id="surnames" wire:model="surnames" required>
        </div>
        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" wire:model="email" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" wire:model="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" required>
        </div>
        <button type="submit">Registrar Profesor</button>
    </form>

    <!-- Formulario de carga de CSV -->
    <form wire:submit.prevent="uploadCsv" enctype="multipart/form-data">
        <div>
            <label for="csv_file">Subir archivo CSV:</label>
            <input type="file" id="csv_file" wire:model="csv_file" accept=".csv">
        </div>
        <button type="submit">Subir Archivo</button>
    </form>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores de validación -->
    @error('csv_file')
        <div style="color: red;">
            {{ $message }}
        </div>
    @enderror
    @error('name')
        <div style="color: red;">
            {{ $message }}
        </div>
    @enderror
    @error('email')
        <div style="color: red;">
            {{ $message }}
        </div>
    @enderror
    @error('password')
        <div style="color: red;">
            {{ $message }}
        </div>
    @enderror
</div>
