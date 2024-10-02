<?php
require_once("../../global.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = $_POST['remember'] ?? false;

    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Email and Password are required.']);
        exit;
    }

    try {
        $where = "email = '" . $email . "'";
        $user = $dbFunctions->getData('users', $where);

        if ($user) {
            $user = $user[0];

            // Uncomment this if you want to check email verification status
            // if ($user['verified'] != 1) {
            //     echo json_encode(['status' => 'error', 'message' => 'Please verify your email first.']);
            //     exit;
            // }
       
            if (password_verify($password, $security->decrypt($user['password']))) {
                if ($remember) {
                    setcookie("user_id", $user['id'], time() + (86400 * 30), "/");
                }

                session_start();
                $_SESSION['user_id'] = $security->decrypt($user['id']);
                $_SESSION['username'] = $security->decrypt($user['username']);
                $_SESSION['user_role'] = $security->decrypt($user['role']);

                echo json_encode(['status' => 'success', 'role' => $user['role']]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid password.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No user found with this email.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>
