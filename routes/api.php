<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\PurchaseReturnController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\SalesReturnController;
use App\Http\Controllers\api\StockController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\vue\CustomerController as VueCustomerController;
use App\Http\Controllers\api\vue\SupplierController as VueSupplierController;
use App\Http\Controllers\api\vue\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('sales', SalesController::class);
Route::resource('purchase',PurchaseController ::class);
Route::resource('purchaseReturn',PurchaseReturnController ::class);
Route::resource('saleReturn',SalesReturnController ::class);
Route::resource('stock',StockController::class);
Route::resource('supplier',SupplierController::class);
Route::post('supplier/save', [SupplierController::class, 'store']);

Route::resource('customers',CustomerController::class);
Route::post('customer/save', [CustomerController::class, 'store']);
Route::delete('customers/delete/{id}', [CustomerController::class, 'destroy']);



Route::get('stock',[StockController::class,'stock_join']);
Route::get('stock_report',[StockController::class,'index']);





Route::get('find_supplier',[SupplierController::class,'find_supplier']);

Route::get('find_customer',[SalesController::class,'find_customer']);


Route::get('find_product',[ProductController::class,'find_product']);


Route::post('purchase/react_store',[ProductController::class,'react_store']);


Route::post('sales/react_store',[SalesController::class,'react_store']);




// For Vue
Route::resource('customers', VueCustomerController::class);
Route::resource('users', UserController::class);
Route::resource('suppliers', VueSupplierController::class);


