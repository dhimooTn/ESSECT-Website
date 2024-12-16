document.getElementById('chat-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get form data
    var name = document.getElementById('username').value;
    var message = document.querySelector('textarea[name="message"]').value;

    // Ensure name and message are provided
    if (name && message) {
        var formData = new FormData();
        formData.append('name', name);
        formData.append('message', message);

        // Send the form data using Fetch API
        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // Update the chat box with new messages after submitting
                document.getElementById('chat-box').innerHTML = data;

                // Clear the message textarea after submission
                document.querySelector('textarea[name="message"]').value = '';
            })
            .catch(error => console.error('Error:', error));
    }
});

// Function to load chat messages periodically
function loadMessages() {
    fetch('contact.php') // This fetches the latest chat history
        .then(response => response.text())
        .then(data => {
            // Update the chat box with the latest messages
            document.getElementById('chat-box').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

// Fetch messages every 2 seconds
setInterval(loadMessages, 2000);