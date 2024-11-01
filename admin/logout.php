<?php
require_once("../global.php"); 
    if (isset($_SESSION['userid'])) {

        $userId = base64_decode($_SESSION['userid']); 

    
        $dbFunctions->updateData('users', ['remember_token' => NULL], "id = '$userId'");

        session_unset();
        session_destroy();

        if (isset($_COOKIE['remember_token'])) {
            setcookie("remember_token", "", time() - 3600, "/");
        }

        header('Location: login.php');
        exit();
    } else {
        header('Location: login.php');
        exit();
    }
?>
