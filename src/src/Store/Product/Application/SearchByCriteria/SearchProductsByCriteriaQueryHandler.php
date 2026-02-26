<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\SearchByCriteria;

use DddPrueba\Store\Product\Application\Response\ProductResponse;
use DddPrueba\Store\Product\Application\Response\ProductsResponse;
use DddPrueba\Store\Product\Domain\Product;

final class SearchProductsByCriteriaQueryHandler
{
    public function __construct(
        private readonly ProductsByCriteriaSearcher $searcher
    ) {}

    public function __invoke(SearchProductsByCriteriaQuery $query): ProductsResponse
    {
        $entities = $this->searcher->search($query->criteria());

        $responses = array_map(
            fn(Product $entity) => ProductResponse::fromAggregate($entity),
            $entities
        );
    }
}
