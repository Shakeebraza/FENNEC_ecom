<?php
require_once("../global.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country = $_POST['country'] ?? '';
    $city = $_POST['city'] ?? '';
    $contactNumber = $_POST['contactNumber'] ?? '';
    $address = $_POST['address'] ?? '';

    $userId = $_SESSION['user_id']; 

    $data = [
        'country' => $country,
        'city' => $city,
        'number' => $contactNumber,
        'address' => $address,
        'updated_at'=>date('Y-m-d H:i:s')
    ];

    // Update user data
    $response = $dbFunctions->updateData('user_detail', $data, "id = $userId");

    if ($response['success']) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update details']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
