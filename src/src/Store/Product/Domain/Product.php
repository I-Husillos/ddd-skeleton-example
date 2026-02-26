<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Domain;

use Dba\DddSkeleton\Shared\Domain\Aggregate\AggregateRoot;

final class Product extends AggregateRoot
{
    public function __construct(
        private readonly ProductId $id,
        private readonly ProductName $name,
        // price y stock
        private readonly float $price,
        private readonly int $stock
    ) {}

    public static function create(ProductId $id, ProductName $name, float $price, int $stock): self
    {
        $model = new self($id, $name, $price, $stock);
        // $model->record(new ProductCreated($id->value()));
        return $model;
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    // price y stock
    public function price(): float
    {
        return $this->price;
    }

    public function stock(): int
    {
        return $this->stock;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'price' => $this->price,
            'stock' => $this->stock,
        ];
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            new ProductId($primitives['id']),
            new ProductName($primitives['name']),
            (float) $primitives['price'],
            (int) $primitives['stock']
        );
    }
}
