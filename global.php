<?php
// <<<<<<< Updated upstream
// =======
error_reporting(error_level: E_ALL);
ini_set('display_errors', 1);

// >>>>>>> Stashed changes
require_once 'dbcon/Database.php';
require_once 'classes/User.php';
require_once 'classes/Security.php';
require_once 'classes/CsrfProtection.php';
require_once 'classes/DatabaseFunctions.php';
// <<<<<<< Updated upstream

$db = new Database(); // This will establish the database connection
$security = new Security('fennec'); // Initialize Security class
$dbFunctions = new DatabaseFunctions($db, $security); // Pass the Database object and Security object

// =======
require_once 'fun/Fun.php';
// require_once 'email/email.php';
$urlval = "http://localhost/fennce/";
$db = new Database();
$pdo = $db->getConnection();
$security = new Security('fennec');
$CsrfProtection = new CsrfProtection(); 
$dbFunctions = new DatabaseFunctions($db, $security);
$fun = new Fun($db, $security, $dbFunctions,$urlval);
$currentDate = date('Y-m-d'); 
$currentTime = date('H:i:s');
$currentDateTime = date('Y-m-d H:i:s'); 
// >>>>>>> Stashed changes
?>
