<?php
// todo szétbontai storefont és admin route-okat
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;

use Illuminate\Support\Facades\Route;

// Route::resource('pizzas', ProductController::class);
// Route::resource('categories', CategoryController::class);


Route::get('/', function () {
    return view('welcome');
});

// Admin rész: csak bejelentkezett felhasználónak
Route::/*middleware(['auth'])->*/prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/new', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/new', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    /*
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('order.destroy');
*/

    /*
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->except(['show']);
    */
});

// require __DIR__.'/auth.php';
