<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Controller;

use DddPrueba\Store\Product\Application\Create\CreateProductCommand;
use DddPrueba\Store\Product\Application\Create\CreateProductCommandHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class CreateProductController
{
    public function __construct(private readonly CreateProductCommandHandler $handler) {}

    public function __invoke(Request $request): JsonResponse
    {
        $command = new CreateProductCommand(
            $request->input('id'),
            $request->input('name'),
            $request->input('price'),
            $request->input('stock')
        );

        ($this->handler)($command);

        return new JsonResponse(null, 201);
    }
}
