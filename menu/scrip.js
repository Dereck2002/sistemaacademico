function toggleChat() {
    var chatContainer = document.querySelector(".chat-container");
    chatContainer.classList.toggle("open");
}

function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    var chatBox = document.getElementById("chat-box");
    chatBox.innerHTML += "<p><strong>Tú:</strong> " + userInput + "</p>";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chatbot.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            chatBox.innerHTML += "<p><strong>Chatbot:</strong> " + response + "</p>";
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    };
    xhr.send("question=" + userInput);
}
