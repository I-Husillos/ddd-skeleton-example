<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Delete;

use DddPrueba\Catalog\Product\Domain\ProductRepository;
use DddPrueba\Catalog\Product\Domain\ProductId;

final class DeleteProductCommandHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(DeleteProductCommand $command): void
    {
        $this->repository->remove(new ProductId($command->id()));
    }
}
