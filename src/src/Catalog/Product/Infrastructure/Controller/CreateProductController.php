<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Infrastructure\Controller;

use DddPrueba\Catalog\Product\Application\Create\CreateProductCommand;
use DddPrueba\Catalog\Product\Application\Create\CreateProductCommandHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class CreateProductController
{
    public function __construct(private readonly CreateProductCommandHandler $handler) {}

    public function __invoke(Request $request): JsonResponse
    {
        $command = new CreateProductCommand(
            $request->input('id'),
            $request->input('name')
        );

        ($this->handler)($command);

        return new JsonResponse(null, 201);
    }
}
