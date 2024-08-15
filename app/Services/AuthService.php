<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    public function login(array $credentials): array
    {
        $token = Auth::attempt($credentials);
        if (!$token) {
            return [
                'error' => 'Unauthorized',
            ];
        }

        $user = Auth::user();

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function refresh(): array
    {
        $token = Auth::refresh();
        $user = Auth::user();

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function generateTokenFromUser(User $user): array
    {
        $token = Auth::login($user);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
