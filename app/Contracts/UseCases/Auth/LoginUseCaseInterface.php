<?php

namespace App\Contracts\UseCases\Auth;

interface LoginUseCaseInterface
{
    public function execute(array $credentials): array;
}
