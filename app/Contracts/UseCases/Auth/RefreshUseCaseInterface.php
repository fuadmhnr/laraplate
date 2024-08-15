<?php

namespace App\Contracts\UseCases\Auth;

interface RefreshUseCaseInterface
{
    public function execute(): array;
}
