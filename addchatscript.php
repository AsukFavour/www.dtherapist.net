<?php
    $email = $email;
    include 'geminiKey.php';
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Optional: Load chat history from the server when the page loads
        // var userEmail = "<?php echo $email; ?>";
        // loadChatHistory(userEmail);
    });

    function sendMessage() {
        var messageInput = document.getElementById('messageInput');
        var userMessage = messageInput.value;

        if (userMessage.trim() !== '') {
            var chatContainer = document.getElementById('chat-container');

            // Add the user's message to the chat container
            var userMessageElement = document.createElement('div');
            userMessageElement.className = 'profile-activity clearfix';
            userMessageElement.innerHTML = `
                <div>
                    <img class="pull-left" alt="User's avatar" src="assets/images/avatars/avatar2.png" />
                    <a class="user" href="#"> <?php echo $fname; ?> </a>
                    <p>${userMessage.replace(/\n/g, '<br>')}</p>
                    <div class="time">
                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                        Just now
                    </div>
                </div>`;
            chatContainer.appendChild(userMessageElement);

            // Clear the input field
            messageInput.value = '';

            // Send the user's message to the Gemini API
            sendToGemini(userMessage);

            // Scroll to the bottom after adding the user's message
            scrollToBottom();
        }
    }

    function receiveMessage(userMessage, aiMessage) {
        var chatContainer = document.getElementById('chat-container');

        // Add the AI's message to the chat container
        var aiMessageElement = document.createElement('div');
        aiMessageElement.className = 'profile-activity clearfix';
        aiMessageElement.innerHTML = `
            <div>
                <i class="pull-left thumbicon fa fa-robot btn-info no-hover"></i>
                <a class="user" href="#">AI</a>
                <p>${aiMessage.replace(/\n/g, '<br>')}</p>
                <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    Just now
                </div>
            </div>`;
        chatContainer.appendChild(aiMessageElement);

        // Scroll to the bottom after adding the messages
        scrollToBottom();
    }

    function sendToGemini(userMessage) {
        // Check for internet connectivity
        if (!navigator.onLine) {
            receiveMessage(userMessage, "Sorry, there is no internet connection.");
            return;
        }

        const YOUR_API_KEY = "<?php echo $key; ?>"; // Generate API Key at Google AI Studio and use it here.

        const prompt = `
            Your name is Smartie. You are a friendly and helpful health care assistant for Glo Smart Health App. Your core duty is to provide health care information to users. You were created by Dr Mbah Bernard, the CEO of Caldoc Systems. Always use emojis in your responses.

            User message: "${userMessage}"
        `;

        const jsonData = JSON.stringify({
            contents: [
                {
                    parts: [
                        {
                            text: prompt
                        }
                    ]
                }
            ]
        });

        const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=${YOUR_API_KEY}`;

        async function fetchData(url, jsonData) {
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: jsonData
                });

                const data = await response.json();

                // Navigate the response object to extract the text
                var aiReply = data.candidates[0].content.parts[0].text;
                console.log(aiReply); // You can now use aiReply as needed
                receiveMessage(userMessage, aiReply);
            } catch (error) {
                console.error('Error:', error);
                receiveMessage(userMessage, "Sorry, there was an error processing your request.");
            }
        }

        fetchData(url, jsonData);
    }

    function scrollToBottom() {
        var chatContainer = document.getElementById('chat-container');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    }
</script>