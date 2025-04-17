<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\PurchaseReturnController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\SalesReturnController;
use App\Http\Controllers\api\StockController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\vue\AuthController;
use App\Http\Controllers\api\vue\CategoryController;
use App\Http\Controllers\api\vue\CouponController;
use App\Http\Controllers\api\vue\CustomerController as VueCustomerController;
use App\Http\Controllers\api\vue\ProductController as VueProductController;
use App\Http\Controllers\api\vue\PurchaseController as VuePurchaseController;
use App\Http\Controllers\api\vue\PurchaseDetailsController;
use App\Http\Controllers\api\vue\PurchaseReportController;
use App\Http\Controllers\api\vue\PurchaseReturnController as VuePurchaseReturnController;
use App\Http\Controllers\api\vue\PurchaseReturnDetailsController;
use App\Http\Controllers\api\vue\RoleController;
use App\Http\Controllers\api\vue\SaleController;
use App\Http\Controllers\api\vue\SelfController;
use App\Http\Controllers\api\vue\StatusController;
use App\Http\Controllers\api\vue\SupplierController as VueSupplierController;
use App\Http\Controllers\api\vue\UserController;

use App\Http\Controllers\api\vue\SaleDetailsController;
use App\Http\Controllers\api\vue\SalesDocumentController;
use App\Http\Controllers\api\vue\SalesReportController;
use App\Http\Controllers\api\vue\SalesReturnController as VueSalesReturnController;
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
Route::apiResource('customers',VueCustomerController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('suppliers', VueSupplierController::class);
Route::apiResource('self', SelfController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('coupons', CouponController::class);
Route::apiResource('status', StatusController::class);
Route::apiResource('products', VueProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::get('allcategories',[ CategoryController::class, 'getAllCategories']);
Route::apiResource('purchase', VuePurchaseController::class);
Route::apiResource('purchase_details', PurchaseDetailsController::class);
Route::apiResource('purchase_return', VuePurchaseReturnController::class);
Route::apiResource('purchaseDetails_return', PurchaseReturnDetailsController::class);
// Route::apiResource('sales', SaleController::class);


Route::apiResource('sale_details', SaledetailsController::class);
Route::apiResource('sales_return', VueSalesReturnController::class);
// Route::get('purchaseReport/data',[ PurchaseReportController::class, "index"]);
Route::get('/purchaseReport/data', [PurchaseReportController::class, 'data']);
Route::post('purchaseReport',[ PurchaseReportController::class, "purcahseReport"]);



Route::get('/purchaseReport/data', [SalesReportController::class, 'index']);
Route::post('/purchaseReport', [SalesReportController::class, 'search']);



//sales documents

Route::get('sales/data', [SalesDocumentController::class, "index"]);
Route::get('sales', [SaleController::class, "index"]);
Route::get('sales_manage', [SaleController::class, "Manage"]);
Route::post('/sales/processOrder', [SalesDocumentController::class, "process"]);

// Route::prefix('vue')->group(function () {
//     Route::apiResource('customers', VueCustomerController::class);
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('suppliers', VueSupplierController::class);
//     Route::apiResource('self', SelfController::class);
// });


Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::post('logout', [AuthController::class,'logout']);
