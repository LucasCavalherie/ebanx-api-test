<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Services\AccountService;
use App\Services\EventService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        // Registrando o serviço de contas
//        $this->app->singleton(AccountService::class, function ($app) {
//            $repository = new AccountRepository();
//            return new AccountService($repository);
//        });
//
//        // Registrando o serviço de eventos
//        $this->app->singleton(EventService::class, function ($app) {
//            $repository = new AccountRepository();
//            return new EventService($repository);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
