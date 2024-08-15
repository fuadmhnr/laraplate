<?php

namespace App\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data);
}
