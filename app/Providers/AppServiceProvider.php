<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TarefaRepositoryInterface;
use App\Repositories\TarefaRepository;
use App\Services\Interfaces\TarefaServiceInterface;
use App\Services\TarefaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TarefaServiceInterface::class,
            TarefaService::class
        );

        $this->app->bind(
            TarefaRepositoryInterface::class,
            TarefaRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
