<?php

declare(strict_types=1);

namespace DddPrueba\Store\Product\Infrastructure\Controller;

use DddPrueba\Store\Product\Application\SearchByCriteria\CountProductsByCriteriaQuery;
use DddPrueba\Store\Product\Application\SearchByCriteria\CountProductsByCriteriaQueryHandler;
use DddPrueba\Store\Product\Application\SearchByCriteria\SearchProductsByCriteriaQuery;
use DddPrueba\Store\Product\Application\SearchByCriteria\SearchProductsByCriteriaQueryHandler;
use DddPrueba\Store\Product\Domain\Product;
use Dba\DddSkeleton\Shared\Domain\Criteria\Filters;
use Dba\DddSkeleton\Shared\Domain\Criteria\Order;
use Dba\DddSkeleton\Shared\Infrastructure\Criteria\RequestCriteriaBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Lambdish\Phunctional\map;

final class SearchProductsByCriteriaController
{
    public function __construct(
        private readonly RequestCriteriaBuilder $requestCriteriaBuilder,
        private readonly SearchProductsByCriteriaQueryHandler $searcher, // Uses Handler!
        private readonly CountProductsByCriteriaQueryHandler $counter
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $criteria = $this->requestCriteriaBuilder->buildFromRequest($request);
        ));

        $currentPage = $limit ? (int) floor($offset / $limit) + 1 : 1;
        $totalPages = $limit ? (int) ceil($filteredRecords / $limit) : 1;

        return new JsonResponse([
            'records' => map(fn(Product $model) => $model->toPrimitives(), $articles),
            'meta' => [
                'current_page' => $currentPage,
                'total_pages' => $totalPages,
                'filtered_records' => $filteredRecords,
                'total_records' => $totalRecords,
                'per_page' => $limit,
                'limit' => $limit,
                'offset' => $offset
            ]
        ], 200);
    }
}
