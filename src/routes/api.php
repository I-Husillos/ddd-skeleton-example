<?php

use DddPrueba\Catalog\Product\Infrastructure\Controller\CreateProductController;
use DddPrueba\Catalog\Product\Infrastructure\Controller\DeleteProductController;
use DddPrueba\Catalog\Product\Infrastructure\Controller\FindProductController;
use DddPrueba\Catalog\Product\Infrastructure\Controller\UpdateProductController;
use Illuminate\Support\Facades\Route;

Route::post('/products', CreateProductController::class);
Route::get('products/{id}', FindProductController::class);
Route::put('products/{id}', UpdateProductController::class);
Route::delete('/products/{id}', DeleteProductController::class);