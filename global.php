<?php
require_once 'dbcon/Database.php';
require_once 'classes/User.php';
require_once 'classes/Security.php';
require_once 'classes/CsrfProtection.php';
require_once 'classes/DatabaseFunctions.php';

$urlval ="http://localhost/fennec/";
$db = new Database();
$pdo = $db->getConnection();
$security = new Security('fennec');
$dbFunctions = new DatabaseFunctions($db, $security);

?>
