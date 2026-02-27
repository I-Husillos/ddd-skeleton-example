<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Create;

use DddPrueba\Catalog\Product\Domain\Product;
use DddPrueba\Catalog\Product\Domain\ProductId;
use DddPrueba\Catalog\Product\Domain\ProductName;
use DddPrueba\Catalog\Product\Domain\ProductRepository;
use Illuminate\Support\Str;

final class CreateProductCommandHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(CreateProductCommand $command): void
    {
        $id = new ProductId(Str::uuid()->toString());
        $name = new ProductName($command->name());
        $price = $command->price();
        $description = $command->description();
        $model = Product::create($id, $name, $price, $description);

        $this->repository->save($model);
    }
}
