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
    // trả về user hiện tại đang login
    Route::get('/getUserLogin', function() {
        return Auth::user();
    })->middleware('auth');
    // lấy các message trong db ra, đi kèm là thông tin user người gửi message đó
    Route::get('/messages', function() {
        return App\Models\Message::with('user')->get();
    })->middleware('auth');
    /* 
        save message do user gửi đi vào db. Tạo thêm 1 route để Vue component có thể 
        gọi và lấy dữ liệu chat ban đầu (history chat) lúc mới load trang. Quay trở lại Vue component ChatLayout.vue
        để tiết lập sự kiện gửi tin nhắn.
    */
    Route::post('/messages', function() {
        $user = Auth::user();

        $message = new App\Models\Message();
        $message->message = request()->get('message', '');
        $message->user_id = $user->id;
        $message->save();

        return ['message'=>$message->load('user')];
    })->middleware('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
