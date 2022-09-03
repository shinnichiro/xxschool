<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\MessagesController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('user/index', [UsersController::class, 'index'])->name('user.index');
    Route::get('user/topics/show', [TopicsController::class, 'show'])->name('user.topics.show');
    Route::get('user/topics/{id}/edit', [TopicsController::class, 'edit'])->name('user.topics.edit');
    Route::post('user/topics/{id}/store', [TopicsController::class, 'store'])->name('user.topics.store');
    Route::post('user/topics/create', [TopicsController::class, 'create'])->name('user.topics.create');
    Route::delete('user/topics/{id}/destroy', [TopicsController::class, 'destroy'])->name('user.topics.destroy');

    Route::get('user/inquiry/show', [InquiriesController::class, 'show'])->name('user.inquiry.show');
    Route::post('user/inquiry/{id}/store', [InquiriesController::class, 'store'])->name('user.inquiry.store');

    Route::get('user/score/index', [ScoresController::class, 'index'])->name('user.score.index');
    Route::get('user/score/show', [ScoresController::class, 'show'])->name('user.score.show');
    Route::post('user/score/show', [ScoresController::class, 'show'])->name('user.score.show');
    Route::post('user/score/create', [ScoresController::class, 'create'])->name('user.score.create');
    Route::post('user/score/{id}/edit', [ScoresController::class, 'edit'])->name('user.score.edit');
    Route::get('user/score/{id}/edit', [ScoresController::class, 'edit'])->name('user.score.edit');
    Route::post('user/score/{id}/store', [ScoresController::class, 'store'])->name('user.score.store');
    Route::delete('user/score/{id}/destroy', [ScoresController::class, 'destroy'])->name('user.score.destroy');

    Route::get('user/message/index', [MessagesController::class, 'index'])->name('user.message.index');
    Route::post('user/message/create', [MessagesController::class, 'create'])->name('user.message.create');
    Route::get('user/message/{id}/show', [MessagesController::class, 'show'])->name('user.message.show');
    Route::post('user/message/{id}/store', [MessagesController::class, 'store'])->name('user.message.store');
    Route::delete('user/message/{id}/destroy', [MessagesController::class, 'destroy'])->name('user.message.destroy');

    Route::get('user/auth', [UsersController::class, 'auth'])->name('user.auth');
    Route::post('user/auth/show', [UsersController::class, 'show'])->name('user.auth.show');
    Route::get('user/auth/show', [UsersController::class, 'show'])->name('user.auth.show');
    Route::post('user/auth/{id}/store', [UsersController::class, 'store'])->name('user.auth.store');
    Route::get('user/auth/{id}/store', [UsersController::class, 'store'])->name('user.auth.store');
    Route::delete('user/auth/{id}/destroy', [UsersController::class, 'destroy'])->name('user.auth.destroy');
});