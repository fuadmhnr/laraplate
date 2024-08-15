<?php

namespace App\Contracts;

interface TodoRepositoryInterface
{
    public function getTodos();
    public function create(array $data);
}
