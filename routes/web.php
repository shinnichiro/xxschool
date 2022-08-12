<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicsController;

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
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('user/index', [UsersController::class, 'index'])->name('user.index');
Route::get('user/topics/show', [TopicsController::class, 'show'])->name('user.topics.show');
Route::get('user/topics/{id}/edit', [TopicsController::class, 'edit'])->name('user.topics.edit');
Route::post('user/topics/{id}/store', [TopicsController::class, 'store'])->name('user.topics.store');
Route::post('user/topics/create', [TopicsController::class, 'create'])->name('user.topics.create');
Route::delete('user/topics/{id}/destroy', [TopicsController::class, 'destroy'])->name('user.topics.destroy');

Route::get('user/inquiry/show', [InquiriesController::class, 'show'])->name('user.inquiry.show');
Route::post('user/inquiry/{id}/store', [InquiriesController::class, 'store'])->name('user.inquiry.store');