<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Infrastructure\Controller;

use DddPrueba\Catalog\Product\Application\Update\UpdateProductCommand;
use DddPrueba\Catalog\Product\Application\Update\UpdateProductCommandHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UpdateProductController
{
    public function __construct(private readonly UpdateProductCommandHandler $handler) {}

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $command = new UpdateProductCommand(
            $id,
            $request->input('name'), // Adjust arguments as needed
            $request->input('price'),
            $request->input('description')
        );

        ($this->handler)($command);

        return new JsonResponse(null, 204);
    }
}
