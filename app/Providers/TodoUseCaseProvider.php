<?php

namespace App\Providers;

use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;
use App\Contracts\UseCases\Todo\GetTodosUseCaseInterface;
use App\UseCases\Todo\CreateTodoUseCase;
use App\UseCases\Todo\GetTodosUseCase;
use Illuminate\Support\ServiceProvider;

class TodoUseCaseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateTodoUseCaseInterface::class, CreateTodoUseCase::class);
        $this->app->bind(GetTodosUseCaseInterface::class, GetTodosUseCase::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
