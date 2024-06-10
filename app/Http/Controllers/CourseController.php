<?php

namespace App\Http\Controllers;

use App\Models\Course;  // 确保导入 Course 模型
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function showIntroduction()
    {
        $user = Session::get('user');
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

        $course = Course::find($id);
        $path = $request->file('image')->store('images', 'public');

        $course->image_url = 'storage/' . $path;
        $course->save();

        return back()->with('success', 'Image updated successfully!');
    }
}
