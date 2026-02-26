<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Create;

use DddPrueba\Store\Product\Domain\Product;
use DddPrueba\Store\Product\Domain\ProductId;
use DddPrueba\Store\Product\Domain\ProductName;
use DddPrueba\Store\Product\Domain\ProductRepository;

final class CreateProductCommandHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(CreateProductCommand $command): void
    {
        $id = new ProductId($command->id());
        $name = new ProductName($command->name());
        $model = Product::create($id, $name, $command->price(), $command->stock());

        $this->repository->save($model);
    }
}
