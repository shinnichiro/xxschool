<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiriesController;

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
    return view('index');
});

Route::get('inquiry', [InquiriesController::class, 'index'])->name('inquiry.index');
Route::post('inquiry.confirm', [InquiriesController::class, 'create'])->name('inquiry.create');