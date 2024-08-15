<?php

namespace App\Contracts\UseCases\Todo;

interface CreateTodoUseCaseInterface
{
    public function execute(array $data): array;
}
