<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport; // Adicione esta linha para importar a classe Passport

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::routes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Defina o número máximo de caracteres para chaves únicas no banco de dados, se necessário.
        \Schema::defaultStringLength(191);
    }
}
