<?php
require_once("../global.php");

$userid=base64_decode($_SESSION['userid']);
$transactions = $dbFunctions->getDatanotenc('payments',"user_id='$userid' ");

echo json_encode($transactions);
?>