<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Update;

use DddPrueba\Store\Product\Domain\ProductRepository;
use DddPrueba\Store\Product\Domain\ProductId;
use DddPrueba\Store\Product\Domain\ProductName;

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

        $this->repository->save($product);
    }
}
