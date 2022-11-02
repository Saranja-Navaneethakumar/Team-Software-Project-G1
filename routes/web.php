<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MedicineTypeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedStockController;

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
    return view('loginpage');
});
Route::post('/userchecklogin',[LoginController::class,'checklogin']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::resource('users',UserController::class);
Route::resource('medicines',MedicineController::class);
Route::resource('categories',CategoryController::class);
Route::resource('stocks',StockController::class);
Route::resource('medicine_types',MedicineTypeController::class);
Route::resource('suppliers',SupplierController::class);
Route::resource('invoices',InvoiceController::class);
Route::get('/dash', [UserController::class,'dashboard'])->name('dash');
Route::get('/medicinesearch', [MedicineController::class,'search'])->name('medicinessearch');
Route::get('/supplierssearch', [SupplierController::class,'search'])->name('supplierssearch');
Route::get('/searchindex', [SearchController::class,'index'])->name('searchindex');
Route::get('/hp', [UserController::class,'headpharmacist'])->name('hp');
Route::resource('invoices',InvoiceController::class);
//Route::get('/medstocks', [MedStockController::class,'index'])->name('medstocks');
Route::get('/allstocks', [StockController::class,'showallstock'])->name('showallstock');
Route::get('/back', [UserController::class,'back'])->name('back');
Route::get('/sales',[StockController::class,'sales'])->name('sales');
Route::get('/myprofile', [UserController::class,'myprofile'])->name('myprofile');
Route::get('/alerts', [UserController::class,'alerts'])->name('alerts');
//Route::get('/medicinescreate',[MedicineController::class, 'create'])->name('medicinescreate');
//Route::get('/userscreate',[UserController::class, 'create'])->name('userscreate');
//Route::get('/usersshow/{id}',[UserController::class, 'show'])->name('usersshow');
//Route::get('/usersshow',[UserController::class, 'show'])->name('usersshow');
//Route::get('/usersedit/{id}',[UserController::class, 'edit']);
//Route::get('/usersshow/{id}',[UserController::class, 'show']);
//Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
//Route::delete('/usersdelete/{id}', [UserController::class, 'destroy'])->name('usersdelete');
