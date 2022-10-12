<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoCode;
use App\Http\Controllers\Chat_Realtime_Controller;
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

Route::get('/', [DemoCode::class, 'index']);

Route::post('/get-select', [DemoCode::class, 'get_select']);
Route::get('/upload-multi', [DemoCode::class, 'index_upload_multi']);
Route::post('/upload-multi-img', [DemoCode::class, 'upload_multi']);

Route::get('/time', [DemoCode::class, 'indextime']);
Route::post('/post-title', [DemoCode::class, 'post_title_time']);

Route::prefix('/message')->group(function () {
    // trả về view chat
    Route::get('/chat', function () {
        return view('chat');
    })->middleware('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
