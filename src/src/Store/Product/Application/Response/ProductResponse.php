<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Response;

use DddPrueba\Store\Product\Domain\Product;

final class ProductResponse
{
    private string $id;
    private string $name;
    private string $created_at;

    public function __construct(string $id, string $name, string $created_at)
    {
        $this->id         = $id;
        $this->name       = $name;
        $this->created_at = $created_at;
    }

    public static function fromAggregate(Product $product): self
    {
        return new self(
            $product->id()->value(),
            $product->name()->value(),
            // Add other fields here mapping from aggregate
            '2024-01-01', // Placeholder for dates if not yet in VO
        );
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'created_at' => $this->created_at,
        ];
    }
}
