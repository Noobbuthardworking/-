<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>课程介绍</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <img src="{{ asset($course->image_url) }}" alt="{{ $course->title }}" style="cursor: pointer;" onclick="document.getElementById('image-upload-{{ $course->id }}').click();">
            <form method="POST" action="{{ route('course.update_image', $course->id) }}" enctype="multipart/form-data" style="display: none;">
                @csrf
                <input type="file" name="image" id="image-upload-{{ $course->id }}" onchange="this.form.submit();">
            </form>
            <p contenteditable="true" data-id="{{ $course->id }}" data-field="content" onblur="updateCourse(this);">{{ $course->content }}</p>
        </div>
        @endforeach
    </section>
    <footer>
        <p>教学设计</p>
        <p>© 2024 All Rights Reserved</p>
    </footer>

    <script>
    function updateCourse(element) {
        var courseId = $(element).data('id');
        var field = $(element).data('field');
        var value = $(element).text();

        $.ajax({
            url: '/update-course/' + courseId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                field: field,
                value: value
            },
            success: function(response) {
                alert('更新成功!');
            },
            error: function() {
                alert('更新失败，请重试。');
            }
        });
    }
    </script>
</body>
</html>
