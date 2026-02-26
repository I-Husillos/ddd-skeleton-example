<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Store\Product\Application\SearchByCriteria;

use DddPrueba\Store\Product\Store\Product\Domain\ProductRepository;
use Dba\DddSkeleton\Shared\Domain\Criteria\Criteria;
use Dba\DddSkeleton\Shared\Domain\Criteria\Filters;
use Dba\DddSkeleton\Shared\Domain\Criteria\Order;

final class CountProductsByCriteriaQueryHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(CountProductsByCriteriaQuery $query): int
    {
        $criteria = new Criteria(
            $query->filters(),
            $query->order(),
            $query->offset(),
            $query->limit()
        );

        return $this->repository->countByCriteria($criteria);
    }
}
