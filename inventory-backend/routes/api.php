<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

Route::apiResource('items', ItemController::class)->only(['index', 'store']);
Route::apiResource('categories', CategoryController::class)->only(['index', 'store']);
Route::apiResource('suppliers', SupplierController::class)->only(['index', 'store']);
Route::get('items/summary', [ItemController::class, 'stockSummary']);
Route::get('items/low-stock', [ItemController::class, 'lowStock']);