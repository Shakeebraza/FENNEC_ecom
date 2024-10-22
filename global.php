<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// link file
require_once 'dbcon/Database.php';
require_once 'classes/User.php';
require_once 'classes/Security.php';
require_once 'classes/CsrfProtection.php';
require_once 'classes/DatabaseFunctions.php';
require_once 'fun/Fun.php';
require_once 'fun/CategoryManager.php';
require_once 'email/email.php';
$urlval = "http://localhost/fennec/";



// classes and object
$db = new Database();
$pdo = $db->getConnection();
$security = new Security('fennec');
$CsrfProtection = new CsrfProtection(); 
$dbFunctions = new DatabaseFunctions($db, $security);
$fun = new Fun($db, $security, $dbFunctions,$urlval);
$categoryManager = new CategoryManager($db, $security, $dbFunctions, $urlval);





// using global
$currentDate = date('Y-m-d'); 
$currentTime = date('H:i:s');
$currentDateTime = date('Y-m-d H:i:s'); 

?>
