<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Find;

use DddPrueba\Catalog\Product\Application\Response\ProductResponse;
use DddPrueba\Catalog\Product\Domain\Product;
use DddPrueba\Catalog\Product\Domain\ProductId;
use DddPrueba\Catalog\Product\Domain\ProductRepository;

final class FindProductQueryHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(FindProductQuery $query): ?ProductResponse
    {
        $id = new ProductId($query->id());
        $entity = $this->repository->find($id);

        return $entity ? ProductResponse::fromAggregate($entity) : null;
    }
}
