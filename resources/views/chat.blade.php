<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with ChatGPT</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>欢迎来到我的页面</h1>

    <!-- 浮窗 -->
    <div class="chat-float" onclick="openChat()">Chat</div>

    <!-- 对话框 -->
    <div class="chat-popup" id="chatPopup">
        <textarea id="userInput" placeholder="Type your message here..."></textarea>
        <button onclick="sendMessage()">Send</button>
        <div id="chatContent"></div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // 为了让CSRF token在AJAX请求中生效
        window.csrfToken = '{{ csrf_token() }}';
    </script>
</body>
</html>
