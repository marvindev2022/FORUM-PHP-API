<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
  public function register(){
  
  }
  

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Passport::routes(); // Registra as rotas do Passport

        // Defina o número máximo de caracteres para chaves únicas no banco de dados, se necessário.
        \Schema::defaultStringLength(191);
    }
}
