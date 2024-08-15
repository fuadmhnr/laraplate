<?php

namespace App\Providers;

use App\Contracts\TodoRepositoryInterface;
use App\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;

class TodoRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
