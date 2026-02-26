<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Application\Find;

final class FindProductQuery
{
    public function __construct(private readonly string $id) {}

    public function id(): string
    {
        return $this->id;
    }
}
