<?php

namespace App\Http\Controllers;

use App\Contracts\UseCases\Auth\{LoginUseCaseInterface};
use App\Contracts\UseCases\Auth\LogoutUseCaseInterface;
use App\Contracts\UseCases\Auth\RefreshUseCaseInterface;
use App\Contracts\UseCases\Auth\RegisterUseCaseInterface;
use App\Http\Requests\Auth\{LoginRequest, RegisterRequest};
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    private $logoutUseCase;
    private $refreshUseCase;
    private $registerUseCase;
    private $loginUseCase;

    public function __construct(
        LogoutUseCaseInterface $logoutUseCase,
        RefreshUseCaseInterface $refreshUseCase,
        RegisterUseCaseInterface $registerUseCase,
        LoginUseCaseInterface $loginUseCase
    ) {
        $this->logoutUseCase = $logoutUseCase;
        $this->refreshUseCase = $refreshUseCase;
        $this->loginUseCase = $loginUseCase;
        $this->registerUseCase = $registerUseCase;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:api', except: ['login', 'register']),
        ];
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->loginUseCase->execute($request->validated());
        return response()->json($result, $result['status'] === 'error' ? 401 : 200);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $result = $this->registerUseCase->execute($request->validated());
        return response()->json($result);
    }

    public function logout()
    {
        $result = $this->logoutUseCase->execute();
        return response()->json($result);
    }

    public function refresh()
    {
        $result = $this->refreshUseCase->execute();
        return response()->json($result);
    }
}
