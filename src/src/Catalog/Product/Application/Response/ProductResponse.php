<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Response;

use DddPrueba\Catalog\Product\Domain\Product;

final class ProductResponse
{
    private string $id;
    private string $name;
    private float $price;
    private string $description;
    private string $created_at;
    private ?string $updated_at;


    public function __construct(string $id, string $name, float $price, string $description, string $created_at, ?string $updated_at = null)
    {
        $this->id         = $id;
        $this->name       = $name;
        $this->price      = $price;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function fromAggregate(Product $product): self
    {
        return new self(
            $product->id()->value(),
            $product->name()->value(),
            $product->price(),
            $product->description(),
            $product->createdAt(),
            $product->updatedAt()
        );
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'price'      => $this->price,
            'description'=> $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
