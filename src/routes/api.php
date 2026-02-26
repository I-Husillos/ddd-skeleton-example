<?php

use Illuminate\Support\Facades\Route;
use DddPrueba\Store\Product\Infrastructure\Controller\CreateProductController;

Route::post('/products', CreateProductController::class);
