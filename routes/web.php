<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/course/introduction', [CourseController::class, 'showIntroduction'])->name('course.introduction');
Route::get('/course/teaching_process', [CourseController::class, 'showTeachingProcess'])->name('course.teaching_process');

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
