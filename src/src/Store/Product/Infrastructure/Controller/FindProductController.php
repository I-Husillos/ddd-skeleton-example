<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Controller;

use DddPrueba\Store\Product\Application\Find\FindProductQuery;
use DddPrueba\Store\Product\Application\Find\FindProductQueryHandler;
use Illuminate\Http\JsonResponse;

final class FindProductController
{
    public function __construct(private readonly FindProductQueryHandler $handler) {}

    public function __invoke(string $id): JsonResponse
    {
        /** @var \DddPrueba\Store\Product\Application\Response\ProductResponse|null $response */
        $response = $this->ask(new FindProductQuery($id));

        if (null === $response) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        return new JsonResponse($response->toArray(), 200);
    }
}
