<?php

namespace App\UseCases\Auth;

use App\Contracts\AuthServiceInterface;
use App\Contracts\UseCases\Auth\RegisterUseCaseInterface;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterUseCase implements RegisterUseCaseInterface
{
    private $authService;
    private $userRepository;

    public function __construct(AuthServiceInterface $authService, UserRepositoryInterface $userRepository)
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
    }

    public function execute(array $userData): array
    {
        $userData['password'] = Hash::make($userData['password']);
        $user = $this->userRepository->create($userData);
        $result = $this->authService->generateTokenFromUser($user);

        return [
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $result['user'],
            'authorization' => [
                'token' => $result['token'],
                'type' => 'bearer',
            ]
        ];
    }
}
