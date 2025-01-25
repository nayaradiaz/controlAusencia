<div class="container">
    <h2>Registro Individual de Profesores</h2>
    <div>
        <form wire:submit.prevent="registerUser">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
               
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>



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