<?php
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: contact.html");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($_SESSION['user_data'])) {
        $userData = $_SESSION['user_data'];
        if ($email == $userData['email'] && password_verify($password, $userData['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_data'] = $userData;
            header('Location: contact.html');
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "No user data found. Please register first.";
    }
}
?>