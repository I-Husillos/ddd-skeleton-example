<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Persistence;

use App\Models\Product as ProductModel;
use DddPrueba\Store\Product\Domain\Product;
use DddPrueba\Store\Product\Domain\ProductId;
use DddPrueba\Store\Product\Domain\ProductRepository;
use Dba\DddSkeleton\Shared\Infrastructure\Persistence\Eloquent\EloquentRepository;
use Dba\DddSkeleton\Shared\Domain\Criteria\Criteria;


final class EloquentProductRepository extends EloquentRepository implements ProductRepository
{
    public function __construct()
    {
        parent::__construct(new ProductModel());
    }


    public function save(Product $model): void
    {
        $this->model->updateOrCreate(
            ['id' => $model->id()->value()],
            $model->toPrimitives()
        );
    }

    public function delete(ProductId $id): void
    {
        $this->newQuery()->where('id', $id->value())->delete();
    }

    public function search(ProductId $id): ?Product
    {
        $model = $this->model->find($id->value());
        // ponemos que pasa un array al toDomain no un modelo
        return $model ? $this->toDomain($model->toArray()) : null;
    }

    public function searchByCriteria(Criteria $criteria): array
    {
        // Use default implementation or override
        return [];
    }

    public function countByCriteria(Criteria $criteria): int
    {
         // Use default implementation or override
         return 0;
    }
    
    // Abstract method implementation... need to map properly
    public function toDomain($model): Product
    {
        return Product::fromPrimitives($model);
    }
}
