<?php

namespace App\UseCases\Todo;

use App\Contracts\TodoRepositoryInterface;
use App\Contracts\UseCases\Todo\GetTodosUseCaseInterface;

class GetTodosUseCase implements GetTodosUseCaseInterface
{
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute()
    {
        $result = $this->todoRepository->getTodos();

        return [
            'status' => 'Retrieved All Todos',
            'data' => $result
        ];
    }
}
