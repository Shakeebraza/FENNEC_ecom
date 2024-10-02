<?php
require_once 'dbcon/Database.php';
require_once 'classes/User.php';
require_once 'classes/Security.php';
require_once 'classes/CsrfProtection.php';
require_once 'classes/DatabaseFunctions.php';

$db = new Database(); // This will establish the database connection
$security = new Security('fennec'); // Initialize Security class
$dbFunctions = new DatabaseFunctions($db, $security); // Pass the Database object and Security object

?>
