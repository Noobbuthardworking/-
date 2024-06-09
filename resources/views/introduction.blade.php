<!DOCTYPE html>
cdata<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>课程介绍</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <nav>
        <div class="logo">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo">

        </div>
        <ul>
            <li><a href="{{ route('course.introduction') }}">课程介绍</a></li>
            <li><a href="{{ route('course.teaching_process') }}">教学过程</a></li>
            <li><a href="{{ route('logout') }}">退出登录</a></li>
        </ul>
    </nav>
    <header>
        <h1>课程介绍</h1>
    </header>
    <section class="course-content">
        @foreach ($courses as $course)
            <div class="course-section">
                <h2>{{ $course->title }}</h2>
                <img src="{{ $course->image_url }}" alt="{{ $course->title }}">
                <p>{{ $course->content }}</p>
            </div>
        @endforeach
    </section>
    <footer>
        <p>教学设计</p>
        <p>© 2024 All Rights Reserved</p>
    </footer>
</body>
</html>
