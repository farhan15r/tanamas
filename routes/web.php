<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReturnCarController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ReportController;
// use PDF;

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
    return redirect('homepage');
});

Route::get('/test', function () {
    $pdf = PDF::loadview('web.invoicetest')->setWarnings(false);
    return $pdf->download('invoice-test.pdf');
});

//web
Route::get('homepage', [WebController::class, 'index']);
Route::get('product_detail/{id}', [WebController::class, 'detailProduct']);
Route::post('/product_search', [WebController::class, 'searchProduct']);
Route::post('/register_customer', [WebController::class, 'registCustomer']);
Auth::routes();
//user
Route::post('/log_out_admin', [UserController::class, 'log_out_admin']);
Route::post('/log_out_customer', [UserController::class, 'log_out_customer']);
//user admin
Route::get('/users', [UserController::class, 'indexAdmin']);
Route::get('/user_delete/{id}', [UserController::class, 'deleteAdmin']);
Route::post('/user_add', [UserController::class, 'createAdmin']);
Route::post('/user_update/{id}', [UserController::class, 'updateAdmin']);

//user customer
Route::get('/customers', [UserController::class, 'indexCustomer']);
Route::get('/customer_delete/{id}', [UserController::class, 'deleteCustomer']);
Route::post('/customer_add', [UserController::class, 'createCustomer']);
Route::post('/customer_update/{id}', [UserController::class, 'updateCustomer']);

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//vendors
Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/categorie_delete/{id}', [CategorieController::class, 'delete']);
Route::post('/categorie_add', [CategorieController::class, 'create']);
Route::post('/categorie_update/{id}', [CategorieController::class, 'update']);

//banks
Route::get('/banks', [BankController::class, 'index']);
Route::get('/bank_delete/{id}', [BankController::class, 'delete']);
Route::post('/bank_add', [BankController::class, 'create']);
Route::post('/bank_update/{id}', [BankController::class, 'update']);

//products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product_delete/{id}', [ProductController::class, 'delete']);
Route::post('/product_add', [ProductController::class, 'create']);
Route::post('/product_update/{id}', [ProductController::class, 'update']);

//transaction
Route::post('/transaction_add', [TransactionController::class, 'createOnline']);
Route::post('/transaction_get_report', [TransactionController::class, 'getReport']);
Route::post('/transaction_upload/{id}', [TransactionController::class, 'uploadBukti']);
Route::get('/transaction_order/{id}', [TransactionController::class, 'OrderCar']);
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transaction_return', [TransactionController::class, 'indexReturn']);
Route::get('/transaction_action/{id}/{status}', [TransactionController::class, 'changeStatus']);
Route::get('/transaction_print_invoice/{id}', [TransactionController::class, 'print_pdf_invoice']);
Route::get('/transaction_product/{id}', [TransactionController::class, 'changeStatusDone']);
Route::get('/report/transactions', [TransactionController::class, 'indexReport']);

//
Route::get('/print_report', [ReportController::class, 'index']);
Route::post('/print_report', [ReportController::class, 'export']);
