<?php

namespace App\UseCases\Auth;

use App\Contracts\AuthServiceInterface;
use App\Contracts\UseCases\Auth\LoginUseCaseInterface;

class LoginUseCase implements LoginUseCaseInterface
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function execute(array $credentials): array
    {
        $result = $this->authService->login($credentials);

        if (isset($result['error'])) {
            return [
                'status' => 'error',
                'message' => $result['error'],
            ];
        }

        return [
            'status' => 'success',
            'user' => $result['user'],
            'authorization' => [
                'token' => $result['token'],
                'type' => 'bearer',
            ]
        ];
    }
}
