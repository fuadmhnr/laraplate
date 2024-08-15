<?php

namespace App\UseCases\Auth;

use App\Contracts\AuthServiceInterface;
use App\Contracts\UseCases\Auth\RefreshUseCaseInterface;

class RefreshUseCase implements RefreshUseCaseInterface
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function execute(): array
    {
        $result = $this->authService->refresh();

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
