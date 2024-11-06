<?php
require_once "../global.php";

if (isset($_SESSION['userid'])) {
    $conversationId = $security->decrypt($_POST['conversation_id']) ?? NULL;

    if (isset($conversationId)) {
        $getMesData = $dbFunctions->getDatanotenc('messages', "conversation_id = '$conversationId'");

        echo '<ul>'; // Open the <ul> tag

        if ($getMesData) {
            foreach ($getMesData as $message) {
                $sender_id = $message['sender_id'];
                $message_text = htmlspecialchars($message['message']);
                $created_at = date("h:i a", strtotime($message['created_at']));

                // Determine if this is the sender or receiver
                $messageClass = $sender_id == base64_decode($_SESSION['userid']) ? 'repaly' : 'sender';

                echo '
                    <li class="'.$messageClass.'">
                        <p>'.$message_text.'</p>
                        <span class="time" style="font-size: 12px; color: #888;">'.$created_at.'</span>
                    </li>
                ';
            }
        } else {
            echo '<li><p>No messages found</p></li>';
        }

        echo '</ul>'; 
    } else {
        echo '<ul><li><p>Invalid conversation ID</p></li></ul>';
    }
} else {
    echo '<ul><li><p>User not authenticated</p></li></ul>';
}
