<?php

namespace App\Http\Controllers;

use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;
use App\Http\Requests\Todo\CreateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TodoController extends Controller implements HasMiddleware
{
    private $createTodoUseCase;

    public function __construct(CreateTodoUseCaseInterface $createTodoUseCase)
    {
        $this->createTodoUseCase = $createTodoUseCase;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:api'),
        ];
    }

    public function create(CreateRequest $request)
    {
        $result = $this->createTodoUseCase->execute($request->validated());
        return response()->json($result);
    }
}
