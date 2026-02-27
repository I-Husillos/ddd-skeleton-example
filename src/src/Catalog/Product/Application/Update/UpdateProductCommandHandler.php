<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Update;

use DddPrueba\Catalog\Product\Domain\ProductRepository;
use DddPrueba\Catalog\Product\Domain\ProductId;
use DddPrueba\Catalog\Product\Domain\ProductName;

final class UpdateProductCommandHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(UpdateProductCommand $command): void
    {
        $id = new ProductId($command->id());
        $product = $this->repository->search($id);

        if (null === $product) {
            return;
        }

        // Apply updates
        // $product->rename(new ProductName($command->name()));

        $product->update(
            $command->name() !== null ? new ProductName($command->name()) : null,
            $command->price(),
            $command->description()
        );

        $this->repository->save($product);
    }
}
