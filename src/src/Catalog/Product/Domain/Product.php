<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Domain;

use Dba\DddSkeleton\Shared\Domain\Aggregate\AggregateRoot;

final class Product extends AggregateRoot
{
    private ProductId $id;
    private ProductName $name;
    private float $price;
    private string $description;
    private string      $createdAt;
    private ?string     $updatedAt;


    public function __construct(
        ProductId $id,
        ProductName $name,
        float $price,
        string $description,
        string $createdAt,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(ProductId $id, ProductName $name, float $price, string $description): self
    {
        $model = new self($id, $name, $price, $description, createdAt: (new \DateTimeImmutable())->format('Y-m-d H:i:s'));
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

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'price' => $this->price,
            'description' => $this->description,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function fromPrimitives(array $data): self
    {
        return new self(
            new ProductId($data['id']),
            new ProductName($data['name']),
            (float)$data['price'],
            $data['description'],
            $data['created_at'],
            $data['updated_at'] ?? null

        );
    }

    public function update(?ProductName $name, ?float $price, ?string $description): void
    {
        if ($name !== null) {
            $this->name = $name;
        }
        if ($price !== null) {
            $this->price = $price;
        }
        if ($description !== null) {
            $this->description = $description;
        }
        $this->updatedAt = (new \DateTimeImmutable())->format('Y-m-d H:i:s');
    }
}
