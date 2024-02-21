<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kuis/{quiz_id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('kuis.detail');
Route::get('/kuis/{quiz_id}/pertanyaan/{question_id}', [App\Http\Controllers\HomeController::class, 'question'])->name('kuis.pertanyaan');
Route::post('/kuis/{quiz_id}/pertanyaan/{question_id}', [App\Http\Controllers\HomeController::class, 'question_store'])->name('kuis.pertanyaan.store');
Route::get('/kuis/{quiz_id}/berhasil', [App\Http\Controllers\HomeController::class, 'success'])->name('kuis.berhasil');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('kuis', QuizController::class);
    Route::resource('pertanyaan', QuestionController::class);
    Route::resource('pengguna', UserController::class);
});
