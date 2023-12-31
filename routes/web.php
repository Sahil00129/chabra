<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoanFinanceController;

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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// logout route
Route::get('/logout', [LoginController::class,'logout']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);

    Route::get('loan-finance', [LoanFinanceController::class,'loanfinance']);
    Route::any('store-loan-detail', [LoanFinanceController::class,'storeLoanFinanceDetails']);
    Route::get('loan-list', [LoanFinanceController::class,'loanList']);
    Route::get('loan-emis', [LoanFinanceController::class,'loanEmi']);
    Route::any('emi-received', [LoanFinanceController::class,'emiReceived']);
    Route::any('view-emis-list/{id}', [LoanFinanceController::class, 'viewEmisList']);

});