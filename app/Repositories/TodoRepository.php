<?php

namespace App\Repositories;

use App\Contracts\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function getTodos($skip = 0, $limit = 10)
    {
        return Todo::select('name')->filter()->get();
    }

    public function create(array $todo)
    {
        return Todo::create($todo);
    }
}
