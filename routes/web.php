<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', SearchController::class . '@index');
    Route::post('/search', SearchController::class . '@propertyLookUp');
    Route::get('/search', SearchController::class . '@propertyLookUp');


    Route::get('/admin/categories', [CategoriesController::class , 'index']);
    Route::post('/admin/categories', [CategoriesController::class , 'store']);
    Route::get('/admin/products', [ProductsController::class , 'index']);
    Route::post('/admin/products', [ProductsController::class , 'store']);

