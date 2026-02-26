<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Controller;

use DddPrueba\Store\Product\Application\Delete\DeleteProductCommand;
use DddPrueba\Store\Product\Application\Delete\DeleteProductCommandHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class DeleteProductController
{
    public function __construct(private readonly DeleteProductCommandHandler $handler) {}

    public function __invoke(string $id): JsonResponse
    {
        ($this->handler)(new DeleteProductCommand($id));

        return new JsonResponse(null, 204);
    }
}
