<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

// 用户登录、登出相关路由
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 课程相关页面路由
Route::get('/course/introduction', [CourseController::class, 'showIntroduction'])->name('course.introduction');
Route::get('/course/teaching_process', [CourseController::class, 'showTeachingProcess'])->name('course.teaching_process');

// 更新课程图片和课程信息的路由
Route::post('/course/update-image/{id}', [CourseController::class, 'updateImage'])->name('course.update_image');
Route::post('/update-course/{id}', [CourseController::class, 'updateCourse'])->name('update-course');

// 静态页面路由
Route::get('/', function () {
    return view('welcome');
});
Route::get('/mypage', function () {
    return view('my_page');
});
Route::get('/chat', function () {
    return view('chat');
});

// 聊天 API 路由
Route::post('/api/chat', [ChatController::class, 'chat']);
Route::post('/update-lesson/{id}', [CourseController::class, 'updateLesson'])->name('update-lesson');
