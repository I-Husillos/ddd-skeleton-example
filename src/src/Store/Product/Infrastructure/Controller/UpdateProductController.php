<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Controller;

use DddPrueba\Store\Product\Application\Update\UpdateProductCommand;
use DddPrueba\Store\Product\Application\Update\UpdateProductCommandHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UpdateProductController
{
    public function __construct(private readonly UpdateProductCommandHandler $handler) {}

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $command = new UpdateProductCommand(
            $id,
            $request->input('name') // Adjust arguments as needed
        );

        ($this->handler)($command);

        return new JsonResponse(null, 204);
    }
}
