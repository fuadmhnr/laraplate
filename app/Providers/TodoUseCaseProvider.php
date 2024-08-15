<?php

namespace App\Providers;

use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;
use App\UseCases\Todo\CreateTodoUseCase;
use Illuminate\Support\ServiceProvider;

class TodoUseCaseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateTodoUseCaseInterface::class, CreateTodoUseCase::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
