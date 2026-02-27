<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Find;

use DddPrueba\Store\Product\Application\Response\ProductResponse;
use DddPrueba\Store\Product\Domain\Product;
use DddPrueba\Store\Product\Domain\ProductId;
use DddPrueba\Store\Product\Domain\ProductRepository;

final class FindProductQueryHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(FindProductQuery $query): ?ProductResponse
    {
        $id = new ProductId($query->id());

        /*
        El stub llama a $this->repository->find() pero la interfaz del repositorio solo define search(), así que lo cambiamos a search() y adaptamos el resultado
        */
        $entity = $this->repository->search($id);

        return $entity ? ProductResponse::fromAggregate($entity) : null;
    }
}
