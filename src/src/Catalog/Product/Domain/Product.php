<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Domain;

use Dba\DddSkeleton\Shared\Domain\Aggregate\AggregateRoot;

final class Product extends AggregateRoot
{
    public function __construct(
        private readonly ProductId $id,
        private readonly ProductName $name,
        private readonly float       $price,
        private readonly string      $description,
    ) {}

    public static function create(ProductId $id, ProductName $name, float $price, string $description): self
    {
        $model = new self($id, $name, $price, $description);
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

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'price' => $this->price,
            'description' => $this->description,
        ];
    }

    public static function fromPrimitives(array $data): self
    {
        return new self(
            new ProductId($data['id']),
            new ProductName($data['name']),
            (float)$data['price'],
            $data['description']
        );
    }
}
