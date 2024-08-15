<?php

namespace App\Contracts;

use App\Models\User;

interface AuthServiceInterface
{
    public function login(array $credentials);
    public function logout();
    public function refresh();
    public function generateTokenFromUser(User $user);
}
