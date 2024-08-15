<?php

namespace App\Repositories;

use App\Contracts\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function getTodos()
    {
        return Todo::get();
    }
    public function create(array $todo)
    {
        return Todo::create($todo);
    }
}
