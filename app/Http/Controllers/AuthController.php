<?php

namespace App\Http\Controllers;

use App\Contracts\UseCases\Auth\{LoginUseCaseInterface};
use App\Contracts\UseCases\Auth\LogoutUseCaseInterface;
use App\Contracts\UseCases\Auth\RefreshUseCaseInterface;
use App\Contracts\UseCases\Auth\RegisterUseCaseInterface;
use App\Http\Requests\Auth\{LoginRequest, RegisterRequest};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

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
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422); // Unprocessable Entity
        // }

        $result = $this->loginUseCase->execute($request->validated());
        return response()->json($result, $result['status'] === 'error' ? 401 : 200);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422); // Unprocessable Entity
        // }


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
