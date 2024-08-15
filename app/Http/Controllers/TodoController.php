<?php

namespace App\Http\Controllers;

use App\Contracts\UseCases\Todo\CreateTodoUseCaseInterface;
use App\Contracts\UseCases\Todo\GetTodosUseCaseInterface;
use App\Http\Requests\Todo\CreateRequest;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        $skip = request('skip', 0);
        $limit = request('limit', 10);

        $result = $this->getTodosUseCase->execute($skip, $limit);
        return response()->json($result);
    }

    public function create(CreateRequest $request)
    {
        $result = $this->createTodoUseCase->execute($request->validated());
        return response()->json($result);
    }
}
