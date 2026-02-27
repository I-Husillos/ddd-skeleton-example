<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\SearchByCriteria;
use DddPrueba\Catalog\Product\Domain\ProductRepository;
use Dba\DddSkeleton\Shared\Domain\Criteria\Criteria;
use Dba\DddSkeleton\Shared\Domain\Criteria\Filters;
use Dba\DddSkeleton\Shared\Domain\Criteria\Order;

final class ProductsByCriteriaSearcher
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): array
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);
        return $this->repository->searchByCriteria($criteria);
    }
}
