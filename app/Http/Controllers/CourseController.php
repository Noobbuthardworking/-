<?php

namespace App\Http\Controllers;

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
}
