<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'categories' => CategoryController::class,
    'products' => ProductController::class,
    'customers' => CustomerController::class,
    'orders' => OrderController::class,
]);
