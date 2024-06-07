<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mypage', function () {
    return view('my_page');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::post('/api/chat', [ChatController::class, 'chat']);
