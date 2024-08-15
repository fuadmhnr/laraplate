<?php

namespace App\Contracts;

interface TodoRepositoryInterface
{
    public function getTodos($skip, $limit);
    public function create(array $data);
}
