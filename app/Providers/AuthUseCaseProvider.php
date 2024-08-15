<?php

namespace App\Providers;

use App\Contracts\UseCases\Auth\LoginUseCaseInterface;
use App\Contracts\UseCases\Auth\LogoutUseCaseInterface;
use App\Contracts\UseCases\Auth\RefreshUseCaseInterface;
use App\Contracts\UseCases\Auth\RegisterUseCaseInterface;
use App\UseCases\Auth\LoginUseCase;
use App\UseCases\Auth\LogoutUseCase;
use App\UseCases\Auth\RefreshUseCase;
use App\UseCases\Auth\RegisterUseCase;
use Illuminate\Support\ServiceProvider;

class AuthUseCaseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginUseCaseInterface::class, LoginUseCase::class);
        $this->app->bind(RegisterUseCaseInterface::class, RegisterUseCase::class);
        $this->app->bind(LogoutUseCaseInterface::class, LogoutUseCase::class);
        $this->app->bind(RefreshUseCaseInterface::class, RefreshUseCase::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
