<?php
require_once "../global.php";

if (isset($_SESSION['userid'])) {
    $conversationId = $security->decrypt($_POST['conversation_id']) ?? NULL;
    $message = $_POST['message'] ?? '';

    if ($conversationId && !empty($message)) {
        $checkQuery = "SELECT id FROM conversations WHERE id = :conversation_id";
        $stmtCheck = $pdo->prepare($checkQuery);
        $stmtCheck->bindParam(':conversation_id', $conversationId);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            $senderId = base64_decode($_SESSION['userid']);
            $createdAt = date("Y-m-d H:i:s");

            $insertQuery = "INSERT INTO messages (conversation_id, sender_id, message, is_read, created_at) 
                            VALUES (:conversation_id, :sender_id, :message, :is_read, :created_at)";
            
            $stmt = $pdo->prepare($insertQuery);
            $stmt->bindParam(':conversation_id', $conversationId);
            $stmt->bindParam(':sender_id', $senderId);
            $stmt->bindParam(':message', $message);
            $stmt->bindValue(':is_read', 0); 
            $stmt->bindParam(':created_at', $createdAt);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid conversation ID']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid conversation ID or empty message']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated']);
}
?>
