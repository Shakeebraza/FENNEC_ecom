<?php
require_once("../../global.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $errors = [];

    if (empty($username)) {
        $errors[] = 'Username is required.';
    } else {
        $usernameCount = $dbFunctions->getCount('users', 'username', "username = '$username'");
        if ($usernameCount > 0) {
            $errors[] = 'Username is already taken.';
        }
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required.'; 
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    } else {
        $emailCount = $dbFunctions->getCount('users', 'email', "email = '$email'");
        if ($emailCount > 0) {
            $errors[] = 'Email is already registered.';
        }
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long.';
    } elseif (strlen($password) > 125) {
        $errors[] = 'Password must be less than 125 characters long.';
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'role'=>0
        ];

        $response = $dbFunctions->setData('users', $data);

        if ($response['success']) {
            echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $response['message']]);
        }
    } else {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
}
