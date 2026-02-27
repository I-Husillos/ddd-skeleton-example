<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Create;

final class CreateProductCommand
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly float  $price,
        private readonly string $description,
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }
}
