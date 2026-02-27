<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Infrastructure\Controller;

use DddPrueba\Catalog\Product\Application\Find\FindProductQuery;
use DddPrueba\Catalog\Product\Application\Find\FindProductQueryHandler;
use Illuminate\Http\JsonResponse;

final class FindProductController
{
    public function __construct(private readonly FindProductQueryHandler $handler) {}

    public function __invoke(string $id): JsonResponse
    {
        /** @var \DddPrueba\Catalog\Product\Application\Response\ProductResponse|null $response */
        //$response = $this->ask(new FindProductQuery($id));

        // usamos el handler directamente para evitar la capa de query bus, ya que no es necesaria en este caso
        $response = ($this->handler)(new FindProductQuery($id));


        if (null === $response) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        return new JsonResponse($response->toArray(), 200);
    }
}
