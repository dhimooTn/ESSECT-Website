<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

$file = 'chat_messages.txt';

// Handle form submission (when a user sends a message)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    // Format the message and append it to the chat file
    $formattedMessage = "<div class='message'><strong>$name</strong>:<p>$message</p></div>";
    file_put_contents($file, $formattedMessage, FILE_APPEND);
}

// Retrieve chat history and display it
$chatHistory = file_exists($file) ? file_get_contents($file) : "<div>No messages yet.</div>";
?>