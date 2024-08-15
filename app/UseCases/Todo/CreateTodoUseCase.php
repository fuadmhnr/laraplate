<?php

namespace App\UseCases\Todo;

use App\Contracts\TodoRepositoryInterface;
use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;

class CreateTodoUseCase implements CreateTodoUseCaseInterface
{
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(array $todo): array
    {
        $result = $this->todoRepository->create($todo);

        if (isset($result['error'])) {
            return [
                'status' => 'error',
                'message' => $result['error'],
            ];
        }

        return [
            'status' => 'Success Create Todo',
            'data' => $todo,
        ];
    }
}
