<?php
require_once("global.php");
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1041048529391-45g6g78c40m7d1lrqgusviptkptrr8jk.apps.googleusercontent.com');
$client->setClientSecret('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'); 
$client->setRedirectUri('https://fennec.phpnode.net/google-login.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_service = new Google_Service_Oauth2($client);
    $user_info = $google_service->userinfo->get();

    $email = $user_info->email;
    $name = $user_info->name;

    $where = "email = '" . $email . "'";
    $user = $dbFunctions->getDatanotenc('users', $where);

    if ($user) {
        $user = $user[0];
        $sessionSet = $fun->sessionSet($email);
        echo json_encode(['status' => 'success', 'role' => $user['role']]);
    } else {
        $data = [
            'email' => $email,
            'username' => $name,
            'password' => password_hash(bin2hex(random_bytes(10)), PASSWORD_DEFAULT), 
            'created_at' => date('Y-m-d H:i:s'),
            'role' => 0,
            'verification_token' => 0,
            'email_verified_at' => date('Y-m-d H:i:s') 
        ];
        $dbFunctions->setData('users', $data);
        $sessionSet = $fun->sessionSet($email);
        echo json_encode(['status' => 'success', 'role' => 1]);
    }

    // Redirect to index.php after successful login
    header("Location: index.php");
    exit();
}
?>