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
        $verificationToken = bin2hex(random_bytes(16)); 

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => 0,
            'verification_token' => $verificationToken 
        ];

        $response = $dbFunctions->setData('users', $data);

        if ($response['success']) {
           
            $verificationLink = $urlval."verify_email.php?token=$verificationToken&email=$email";
            $mailResponse = smtp_mailer($email, 'Email Verification', "Please click the link below to verify your email address:\n$verificationLink");

            if ($mailResponse['success']) {
                echo json_encode(['status' => 'success', 'message' => 'Registration successful! Verification email sent.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Registration successful, but failed to send verification email: ' . $mailResponse['error']]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => $response['message']]);
        }
    } else {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
}
