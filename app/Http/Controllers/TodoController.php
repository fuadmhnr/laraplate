<?php

namespace App\Http\Controllers;

use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;
use App\Contracts\UseCases\Todo\GetTodosUseCaseInterface;
use App\Http\Requests\Todo\CreateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TodoController extends Controller implements HasMiddleware
{
    private $createTodoUseCase;
    private $getTodosUseCase;

    public function __construct(CreateTodoUseCaseInterface $createTodoUseCase, GetTodosUseCaseInterface $getTodosUseCase)
    {
        $this->createTodoUseCase = $createTodoUseCase;
        $this->getTodosUseCase = $getTodosUseCase;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:api'),
        ];
    }

    public function index()
    {
        $result = $this->getTodosUseCase->execute();
        return response()->json($result);
    }

    public function create(CreateRequest $request)
    {
        $result = $this->createTodoUseCase->execute($request->validated());
        return response()->json($result);
    }
}
