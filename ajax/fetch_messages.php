<?php
require_once "../global.php";


if (isset($_SESSION['userid'])) {

    $conversationId = $security->decrypt($_POST['conversation_id']) ?? NULL;
    $UserId = base64_decode($_SESSION['userid']);

    if (isset($conversationId)) {

        $updateQuery = "
            UPDATE messages 
            SET is_read = 1 
            WHERE conversation_id = :conversationId 
            AND sender_id != :userId
        ";

        try {

            $stmt = $pdo->prepare($updateQuery);


            $stmt->bindParam(':conversationId', $conversationId, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $UserId, PDO::PARAM_STR);

            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                // echo 'Messages updated successfully.';
            } else {
                // echo 'No messages to update.';
            }
        } catch (PDOException $e) {

            echo 'Error: ' . $e->getMessage();
        }


        $getMesDataQuery = "
            SELECT * FROM messages 
            WHERE conversation_id = :conversationId
            ORDER BY created_at ASC
        ";

        try {

            $stmt = $pdo->prepare($getMesDataQuery);
            $stmt->bindParam(':conversationId', $conversationId, PDO::PARAM_STR);
            $stmt->execute();


            $getMesData = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($getMesData) {
                echo '<ul>';

                foreach ($getMesData as $message) {
                    $sender_id = $message['sender_id'];
                    $message_text = htmlspecialchars($message['message']);
                    $created_at = date("h:i a", strtotime($message['created_at']));

  
                    $messageClass = $sender_id == base64_decode($_SESSION['userid']) ? 'repaly' : 'sender';


                    echo '
                        <li class="' . $messageClass . '">
                            <p>' . $message_text . '</p>
                            <span class="time" style="font-size: 12px; color: #888;">' . $created_at . '</span>
                        </li>
                    ';
                }

                echo '</ul>';
            } else {
                echo '<ul><li><p>No messages found</p></li></ul>';
            }
        } catch (PDOException $e) {
            // Catch any exceptions when retrieving messages
            echo 'Error fetching messages: ' . $e->getMessage();
        }
    } else {
        echo '<ul><li><p>Invalid conversation ID</p></li></ul>';
    }
} else {
    echo '<ul><li><p>User not authenticated</p></li></ul>';
}
?>
