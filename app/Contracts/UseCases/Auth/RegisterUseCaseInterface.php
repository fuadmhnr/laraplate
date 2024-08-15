<?php

namespace App\Contracts\UseCases\Auth;

interface RegisterUseCaseInterface
{
    public function execute(array $userData): array;
}
