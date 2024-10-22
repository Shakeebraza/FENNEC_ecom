<?php
require_once 'global.php'; 


// Sample data to insert
$data = [
    'username' => 'Hackruf_01',
    'email' => 'user6@example.com',
    'password' => 'Click@123' // Consider hashing passwords before saving
];

// Call setData to insert a new user
if ($dbFunctions->setData('users', $data)) {
    echo "User data inserted successfully.";
} else {
    echo "Failed to insert user data.";
}

?>

