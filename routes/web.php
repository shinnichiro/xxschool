<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [InquiriesController::class, 'home'])->name('index');
Route::get('topics', [InquiriesController::class, 'topics'])->name('topics');
Route::get('inquiry', [InquiriesController::class, 'index'])->name('inquiry.index');
Route::post('inquiry', [InquiriesController::class, 'create'])->name('inquiry.create');
Auth::routes();
