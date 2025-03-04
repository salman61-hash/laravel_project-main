<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Api\SalesReturnController as ApiSalesReturnController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentstatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReportController;
use App\Http\Controllers\PurchasereturnController;
use App\Http\Controllers\PurchasereturndetailsController;
use App\Http\Controllers\PurchasesdetailsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaledetailsController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\SalesreturnController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SupplierReportController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Salereturndetail;
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
Route::resource('accounts',AccountController::class);


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

Route::resource('purchase-returns',PurchasereturnController::class);
Route::resource('sales-returns',SalesreturnController::class);
Route::resource('purchase-return-details',PurchasereturndetailsController::class);
Route::resource('sales-return-details',Salereturndetail::class);

Route::resource('payments', PaymentController::class);
Route::resource('expense_type', ExpenseTypeController::class);
Route::resource('expense', ExpenseController::class);


// sales invoice
Route::post('find_customer', [SaleController::class, 'find_customer']);
Route::post('find_product', [SaleController::class, 'find_product']);
Route::post('find_cupon', [SaleController::class, 'find_cupon']);



//purchase invoice
Route::post('find_supplier', [PurchaseController::class, 'find_supplier']);
Route::post('find_product', [PurchaseController::class, 'find_product']);



//Purchase Report
Route::get('/purchase-report', [PurchaseReportController::class, 'index']);
Route::post('/purchase-report', [PurchaseReportController::class, 'show']);


// Sales Report
Route::get('/sales-report', [SalesReportController::class, 'index']);
Route::post('/sales-report', [SalesReportController::class, 'show']);


// Stock report
Route::get('/stocks-report', [StockReportController::class, 'index']);
Route::post('/stocks-report', [StockReportController::class, 'show']);


// Supplier report
Route::get('/suppliers-report', [SupplierReportController::class, 'index']);
Route::post('/suppliers-report', [SupplierReportController::class, 'show']);


// Customer report

Route::get('/customers-report', [CustomerReportController::class, 'index']);
Route::post('/customers-report', [CustomerReportController::class, 'show']);


// Expense Report

Route::get('/expense-report', [ExpenseReportController::class, 'index']);
Route::post('/expense-report', [ExpenseReportController::class, 'generateReport']);










