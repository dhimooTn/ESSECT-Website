<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['full_name'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['user_data'] = array(
        'full_name' => $fullName,
        'cin' => $cin,
        'email' => $email,
        'phone' => $phone,
        'gender' => $gender,
        'status' => $status,
        'password' => $hashedPassword
    );
    echo "Registration successful! <a href='login.html'>Login here</a>";
    header("Location: login.html"); 
    exit;
} else {
    echo "Invalid request method.";
}
?>
    