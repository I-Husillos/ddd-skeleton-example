<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Delete;

use DddPrueba\Store\Product\Domain\ProductRepository;
use DddPrueba\Store\Product\Domain\ProductId;

final class DeleteProductCommandHandler
{
    public function __construct(private readonly ProductRepository $repository) {}

    public function __invoke(DeleteProductCommand $command): void
    {
        $this->repository->delete(new ProductId($command->id()));
    }
}
