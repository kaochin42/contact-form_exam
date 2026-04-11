<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// --- 【一般公開ページ】 ---
Route::get('/', [ContactController::class, 'index']); Route::post('/confirm', [ContactController::class, 'confirm']); Route::post('/thanks', [ContactController::class, 'store']);

// --- 【管理画面（ログイン必須）】 ---
Route::middleware('auth')->group(function ()
    {
        Route::get('/admin', [ContactController::class, 'admin']); Route::get('/search', [ContactController::class, 'search']); Route::get('/reset', [ContactController::class, 'reset']); Route::delete('/delete', [ContactController::class, 'destroy']);
        Route::get('/export', [ContactController::class, 'export']);
    });
