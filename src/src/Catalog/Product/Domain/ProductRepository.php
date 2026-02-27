<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Domain;

use Dba\DddSkeleton\Shared\Domain\Criteria\Criteria;

interface ProductRepository
{
    public function save(Product $model): void;

    public function remove(ProductId $id): void;

    public function search(ProductId $id): ?Product;

    public function searchByCriteria(Criteria $criteria): array;

    public function countByCriteria(Criteria $criteria): int;
}
