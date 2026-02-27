<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Update;

final class UpdateProductCommand
{
    public function __construct(
        private readonly string $id,
        private readonly ?string $name,
        // price y stock
        private readonly ?float $price,
        private readonly ?int $stock
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function price(): ?float
    {
        return $this->price;
    }

    public function stock(): ?int
    {
        return $this->stock;
    }
}
