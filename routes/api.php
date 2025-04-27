<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\PurchaseReturnController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\SalesReturnController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\vue\AuthController;
use App\Http\Controllers\Api\vue\CategoryController;
use App\Http\Controllers\Api\vue\CouponController;
use App\Http\Controllers\Api\vue\CustomerController as VueCustomerController;
use App\Http\Controllers\Api\vue\ExpenseController;
use App\Http\Controllers\Api\vue\Expenses_typeController;
use App\Http\Controllers\Api\vue\ExpensesController;
use App\Http\Controllers\Api\vue\ProductController as VueProductController;
use App\Http\Controllers\Api\vue\ProfitController;
use App\Http\Controllers\api\vue\ProfitReportController;
use App\Http\Controllers\Api\vue\PurchaseController as VuePurchaseController;
use App\Http\Controllers\Api\vue\PurchaseDetailsController;
use App\Http\Controllers\Api\vue\PurchaseReportController;
use App\Http\Controllers\Api\vue\PurchaseReturnController as VuePurchaseReturnController;
use App\Http\Controllers\Api\vue\PurchaseReturnDetailsController;
use App\Http\Controllers\Api\vue\PurchasesController;
use App\Http\Controllers\Api\vue\RoleController;
use App\Http\Controllers\Api\vue\SaleController;
use App\Http\Controllers\Api\vue\SelfController;
use App\Http\Controllers\Api\vue\StatusController;
use App\Http\Controllers\Api\vue\SupplierController as VueSupplierController;
use App\Http\Controllers\Api\vue\UserController;

use App\Http\Controllers\Api\vue\SaleDetailsController;
use App\Http\Controllers\Api\vue\SalesDocumentController;
use App\Http\Controllers\Api\vue\SalesReportController;
use App\Http\Controllers\Api\vue\SalesReturnController as VueSalesReturnController;
use App\Http\Controllers\Api\vue\StockController as VueStockController;
use App\Http\Controllers\Api\vue\StockReportController;
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
Route::apiResource('expense_type', Expenses_typeController::class);
Route::apiResource('stocks', VueStockController::class);
Route::apiResource('profit', ProfitController::class);
// Route::apiResource('expense', ExpenseController::class);


Route::apiResource('sale_details', SaledetailsController::class);
Route::apiResource('sales_return', VueSalesReturnController::class);
// Route::get('purchaseReport/data',[ PurchaseReportController::class, "index"]);






Route::get('/status_dropdown', [SaleController::class, 'status']);

//sales documents

Route::get('sales/data', [SalesDocumentController::class, "index"]);
Route::get('sales', [SaleController::class, "index"]);
Route::get('sales_manage', [SaleController::class, "Manage"]);
Route::post('sales_process', [SaleController::class, "Process"]);



// purchase documents
Route::get('purchase_manage', [PurchasesController::class, "Manage_purchase"]);
Route::get('purchase', [PurchasesController::class, "index"]);
Route::post('purchase_process', [PurchasesController::class, "Process"]);


// Expense
Route::get('expense', [ExpensesController::class, "Manage_expense"]);
Route::get('expense_data', [ExpensesController::class, "index"]);
Route::post('expense_save', [ExpensesController::class, "store"]);


// stock Report
Route::get('/stock_data', [StockReportController::class, 'index']);
Route::post('/stockReport', [StockReportController::class, 'search']);

// purchase Report
Route::get('/purchase_data', [PurchaseReportController::class, 'index']);
Route::post('/purchaseReport', [PurchaseReportController::class, 'search']);

// Sales Report
Route::get('/sales_data', [SalesReportController::class, 'index']);
Route::post('/salesReport', [SalesReportController::class, 'search']);


// Profit Report
Route::get('/profit_data', [ProfitReportController::class, 'index']);
Route::post('/profitReport', [ProfitReportController::class, 'search']);

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
