<?php

namespace App\UseCases\Auth;

use App\Contracts\AuthServiceInterface;
use App\Contracts\UseCases\Auth\LogoutUseCaseInterface;

class LogoutUseCase implements LogoutUseCaseInterface
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function execute(): array
    {
        $this->authService->logout();

        return [
            'status' => 'success',
            'message' => 'Successfully logged out',
        ];
    }
}
