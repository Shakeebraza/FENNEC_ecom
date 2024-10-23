<?php
require_once("global.php");

if (isset($_GET['token']) && isset($_GET['email'])) {
    $token = $_GET['token'];
    $email = $_GET['email'];

    $user = $dbFunctions->getDatanotenc('users', "email = '$email' AND verification_token = '$token'");

    if ($user && is_array($user) && isset($user[0]['id'])) {
        $userId = $user[0]['id']; 

        $data = [
            'email_verified_at' => $currentDateTime,
            'verification_token' => 0 
        ];

        $updateQuery = $dbFunctions->updateData('users', $data, $userId);

        if ($updateQuery['success'] === true) {
          
            echo "
            <script>
                alert('Email verified successfully! Redirecting to login page...');
                window.location.href = '".$urlval."admin/login.php'; // Redirect to login page
            </script>
            ";
            exit(); 
        } else {
            echo "Something went wrong, please contact the administrator.";
        }

    } else {
        echo "Invalid verification token or email!";
    }
} else {
    echo "No token or email provided!";
}
?>
