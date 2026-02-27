<?php

declare(strict_types=1);

namespace DddPrueba\Catalog\Product\Application\Response;

final class ProductsResponse
{
    private array $products;

    public function __construct(ProductResponse ...$products)
    {
        $this->products = $products;
    }

    public function products(): array
    {
        return $this->products;
    }

    public function toArray(): array
    {
        return array_map(fn(ProductResponse $response) => $response->toArray(), $this->products);
    }
}
