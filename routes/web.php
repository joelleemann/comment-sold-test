<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/products/{product}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
    Route::get('/products/new', [\App\Http\Controllers\ProductsController::class, 'new'])->name('products.new');
    Route::post('/products', [\App\Http\Controllers\ProductsController::class, 'store']);
    Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products');

    Route::get('/inventory/{sku}', [\App\Http\Controllers\InventoryController::class, 'show'])->name('inventory.show');
    Route::get('/inventory/new', [\App\Http\Controllers\InventoryController::class, 'new'])->name('inventory.new');
    Route::post('/inventory', [\App\Http\Controllers\InventoryController::class, 'store']);
    Route::get('/inventory', [\App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
});

require __DIR__.'/auth.php';
