<?php

namespace App\Providers;

use App\Http\Livewire\AdminUsers;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('admin-users', AdminUsers::class);
    }
}
