// 打开对话框
function openChat() {
    document.getElementById('chatPopup').style.display = 'block';
}

// 发送消息
async function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    const response = await fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.csrfToken
        },
        body: JSON.stringify({ message: userInput })
    });
    const data = await response.json();
    document.getElementById('chatContent').innerHTML += `<p><strong>You:</strong> ${userInput}</p>`;
    document.getElementById('chatContent').innerHTML += `<p><strong>ChatGPT:</strong> ${data.reply}</p>`;
    document.getElementById('userInput').value = '';
}
