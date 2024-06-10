<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'LoginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register.post');
    Route::get('/fogot-password', [AuthController::class, 'ForgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'ForgotPasswordPost'])->name('forgot-password.post');
    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
Route::get('/', function () {
        return view('index', ['data' => App\Models\User::find(Auth::user()->id)]);
    })->name('index');

Route::resource('books', BookController::class)->except(['show']);
Route::resource('users', UsersController::class)->except(['show']);
Route::prefix('transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/borrow', [TransactionController::class, 'borrow'])->name('borrow');
    Route::post('/borrow', [TransactionController::class, 'BorrowBook'])->name('borrow.post');
    Route::post('/return', [TransactionController::class, 'ReturnBook'])->name('return.post');
});


});