<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Domain;

/* 
ProductId representa un identificador único (UUID), no un string genérico

El ArticleId del paquete también extiende Uuid, es el patrón establecido

La clase Uuid del paquete ya incluye validación de formato UUID, mientras que StringValueObject no la tiene

El EloquentProductRepository generado llama a $id->value() para hacer queries, y Uuid garantiza que ese valor es un UUID válido
*/
use Dba\DddSkeleton\Shared\Domain\ValueObject\StringValueObject;
use Dba\DddSkeleton\Shared\Domain\ValueObject\Uuid;

final class ProductId extends Uuid
{
}
