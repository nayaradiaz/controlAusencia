<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Control de Ausencias') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div>

                    <div>
                        @if($showUsers)
                        @livewire('admin-users')
                        @else
                        <h2>Bienvenido al Dashboard</h2>
                        @endif
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>