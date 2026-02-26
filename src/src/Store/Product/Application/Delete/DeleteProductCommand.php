<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Delete;

final class DeleteProductCommand
{
    public function __construct(private readonly string $id) {}

    public function id(): string
    {
        return $this->id;
    }
}
