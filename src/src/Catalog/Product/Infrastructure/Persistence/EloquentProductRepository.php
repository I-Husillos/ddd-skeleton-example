<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Infrastructure\Persistence;

use App\Models\Product as ProductEloquentModel;
use DddPrueba\Catalog\Product\Domain\Product;
use DddPrueba\Catalog\Product\Domain\ProductId;
use DddPrueba\Catalog\Product\Domain\ProductRepository;
use Dba\DddSkeleton\Shared\Infrastructure\Persistence\Eloquent\EloquentRepository;
use Dba\DddSkeleton\Shared\Domain\Criteria\Criteria;
use Dba\DddSkeleton\Shared\Infrastructure\Persistence\Eloquent\EloquentCriteriaConverter;

final class EloquentProductRepository extends EloquentRepository implements ProductRepository
{
    public function __construct(ProductEloquentModel $model)
    {
        $this->model = $model;
    }


    public function save(Product $product): void
    {
        $data = $product->toPrimitives();
        $id = $product->id()->value();
        unset($data['id']); // quitamos el id del array de datos para evitar conflictos con el método updateOrCreate, porque este método espera que el id se pase como parte de la condición de búsqueda, no como parte de los datos a actualizar o crear
        $this->updateOrCreate(
            ['id' => $id],
            $data
        );
    }

    // cambiamos el nombre del método delete a remove para evitar conflictos con el método delete de Eloquent
    public function remove(ProductId $id): void
    {
        $this->model->destroy($id->value());
    }

    public function search(ProductId $id): ?Product
    {
        $model = $this->model->find($id->value());

        if (!$model) {
            return null;
        }

        return Product::fromPrimitives($model->toArray());
    }

    public function searchByCriteria(Criteria $criteria): array
    {
        // Use default implementation or override
        //return [];

        $eloquentCriteria = EloquentCriteriaConverter::convert($criteria);
        $query = $this->matching($eloquentCriteria);

        return array_map(
            fn($model) => Product::fromPrimitives($model->toArray()),
            $query->get()->toArray()
        );
    }

    public function countByCriteria(Criteria $criteria): int
    {
         // Use default implementation or override
         //return 0;

        $eloquentCriteria = EloquentCriteriaConverter::convert($criteria);
        $query = $this->matching($eloquentCriteria);

        return $query->count();
    }
    
    // Abstract method implementation... need to map properly
}
