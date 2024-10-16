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

   
            if (is_null($user['email_verified_at'])) {
                echo json_encode(['status' => 'error', 'message' => 'Please verify your email first.']);
                exit;
            }

            if (password_verify($password, $security->decrypt($user['password']))) {
                
                if ($remember) {
                    $token = bin2hex(random_bytes(16));
                    $expiryTime = time() + (86400 * 30);
                    
                    $dbFunctions->updateData('users', ['remember_token' => $token], $security->decrypt($user['id']));
                
                    setcookie("remember_token",  $token, $expiryTime, "/", "", true, true);
                }

          
                $email = $security->decrypt($user['email']);
                $sessionSet = $fun->sessionSet($email);

     
                echo json_encode(['status' => 'success', 'role' => $security->decrypt($user['role'])]);
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