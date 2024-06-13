<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;  // 确保导入 Lesson 模型
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function showIntroduction()
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect('login'); // 确保用户已登录
        }

        $courses = DB::table('courses')->where('user_id', $user->id)->get();
        return view('introduction', ['courses' => $courses]);
    }

    public function showTeachingProcess()
    {
        $user = Session::get('user');
        $lessons = DB::table('lessons')->where('user_id', $user->id)->get();
        return view('teaching_process', ['lessons' => $lessons]);
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // 限制文件为图片且最大2MB
        ]);

        $course = Course::findOrFail($id);
        $path = $request->file('image')->store('images', 'public');

        $course->image_url = 'storage/' . $path;
        $course->save();

        return back()->with('success', 'Image updated successfully!');
    }

    public function updateLesson(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id); // 确保找到对应的课时，如果没有找到会抛出404异常
        $field = $request->input('field'); // 从请求中获取字段名
        $value = $request->input('value'); // 从请求中获取新的值

        $lesson->$field = $value; // 更新课时模型的相应字段
        $lesson->save(); // 保存更改到数据库

        return response()->json(['success' => 'Lesson updated successfully']); // 返回成功响应
    }
}
