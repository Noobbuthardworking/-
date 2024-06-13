<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教学过程</title>
    <link rel="stylesheet" href="https://cdn.dhtmlx.com/suite/edge/suite.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.dhtmlx.com/suite/edge/suite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!-- 顶部导航栏 -->
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

    <!-- 标题部分 -->
    <header>
        <h1>教学过程</h1>
    </header>

    <!-- 课程内容部分 -->
    <section class="course-content">
        <!-- 第一课时 -->
        <div class="lesson">
            <h2>第一课时</h2>
            <div id="grid1" style="width: 100%; height: 400px;"></div>
        </div>

        <!-- 第二课时 -->
        <div class="lesson">
            <h2>第二课时</h2>
            <div id="grid2" style="width: 100%; height: 400px;"></div>
        </div>
    </section>

    <!-- 底部信息 -->
    <footer>
        <p>课程展示模板</p>
        <p>© 2024 All Rights Reserved</p>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const lessons = JSON.parse('<?php echo json_encode($lessons, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>');

        // 初始化第一课时的Grid
        const grid1 = new dhx.Grid("grid1", {
            columns: [
                { id: "time", header: [{ text: "时间" }], editable: true },
                { id: "activity", header: [{ text: "活动" }], editable: true },
                { id: "content", header: [{ text: "内容" }], editable: true }
            ],
            autoWidth: true,
            height: 400
        });
        const lesson1Data = lessons.filter(lesson => lesson.lesson_no === 1);
        grid1.data.parse(lesson1Data);

        // 监听单元格编辑事件
        grid1.events.on("afterEditEnd", function(row, col, value) {
            updateLesson(row.id, col.id, value);
        });

        // 初始化第二课时的Grid
        const grid2 = new dhx.Grid("grid2", {
            columns: [
                { id: "time", header: [{ text: "时间" }], editable: true },
                { id: "activity", header: [{ text: "活动" }], editable: true },
                { id: "content", header: [{ text: "内容" }], editable: true }
            ],
            autoWidth: true,
            height: 400
        });
        const lesson2Data = lessons.filter(lesson => lesson.lesson_no === 2);
        grid2.data.parse(lesson2Data);

        // 监听单元格编辑事件
        grid2.events.on("afterEditEnd", function(row, col, value) {
            updateLesson(row.id, col.id, value);
        });

        function updateLesson(id, field, value) {
            console.log('updateLesson called with:', id, field, value); // 调试输出

            $.ajax({
                url: '/update-lesson/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    field: field,
                    value: value
                },
                success: function(response) {
                    alert('更新成功!');
                },
                error: function(xhr, status, error) {
                    alert('更新失败，请重试。');
                    console.error(xhr, status, error); // 添加详细错误信息输出
                }
            });
        }
    });
    </script>
</body>
</html>
