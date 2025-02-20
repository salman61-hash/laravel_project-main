<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentstatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasesdetailsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaledetailsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('suppliers/search', [SuppliersController::class, 'search'])->name('supplier.search');
Route::resource('suppliers',SuppliersController::class);


Route::get('product/search', [ProductController::class, 'search'])->name('product.search');

Route::resource('product',ProductController::class);



Route::resource('categories',CategoriesController::class);


Route::get('customers/search', [CustomerController::class, 'search'])->name('customers.search');

Route::resource('customers',CustomerController::class);



Route::resource('payment_status',PaymentstatusController::class);
Route::resource('purchases',PurchaseController::class);
Route::resource('purchase-details',PurchasesdetailsController::class);
Route::resource('cupons',CuponController::class);
Route::resource('users',UserController::class);
Route::resource('sales',SaleController::class);
Route::resource('salesdetails',SaledetailsController::class);
Route::resource('stock',StockController::class);



Route::post('find_customer', [SaleController::class, 'find_customer']);
Route::post('find_product', [SaleController::class, 'find_product']);
Route::post('find_cupon', [SaleController::class, 'find_cupon']);









