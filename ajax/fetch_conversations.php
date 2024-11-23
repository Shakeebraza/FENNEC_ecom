<?php
require_once "../global.php";

if (isset($_SESSION['userid'])) {
    $user_id = base64_decode($_SESSION['userid']);

    $query = "
        SELECT c.*, 
               u1.username AS user_one_name, 
               u1.profile AS user_one_profile, 
               u2.username AS user_two_name, 
               u2.profile AS user_two_profile,
               (SELECT m.message 
                FROM messages m 
                WHERE m.conversation_id = c.id 
                ORDER BY m.id DESC LIMIT 1) AS last_message,
               (SELECT m.is_read
                FROM messages m 
                WHERE m.conversation_id = c.id 
                ORDER BY m.id DESC LIMIT 1) AS last_message_read,
               (SELECT m.sender_id
                FROM messages m 
                WHERE m.conversation_id = c.id 
                ORDER BY m.id DESC LIMIT 1) AS last_sender_id
        FROM conversations c
        LEFT JOIN users u1 ON u1.id = c.user_one
        LEFT JOIN users u2 ON u2.id = c.user_two
        WHERE c.user_one = :user_id OR c.user_two = :user_id
        ORDER BY c.id DESC
    ";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $conversations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($conversations) {
        foreach ($conversations as $conversation) {
            $other_user_name = ($conversation['user_one'] == $user_id) ? $conversation['user_two_name'] : $conversation['user_one_name'];
            $other_user_profile = ($conversation['user_one'] == $user_id) ? $conversation['user_two_profile'] : $conversation['user_one_profile'];

            $profile = 'images/profile.jpg'; 
            $conversation_id = $security->encrypt($conversation['id']);
            $last_message = $conversation['last_message'] ? $conversation['last_message'] : 'Send a message to start the conversation';
            $last_message_read = $conversation['last_message_read']; 
            $last_sender_id = $conversation['last_sender_id']; 
            if($last_sender_id != base64_decode($_SESSION['userid'])){

                $message_style = ($last_message_read == 0) ? 'font-weight: bold;' : '';
            }else{
                $message_style ='';
            }

            echo '
            <a href="#" class="d-flex align-items-center" style="text-decoration: none; padding: 10px; border-bottom: 1px solid #ddd;" onclick="loadMessages(\'' . $conversation_id . '\')">
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="' . $urlval . $profile . '" alt="user img" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 style="font-size: 16px; margin: 0; color: #00494f;">' . $other_user_name . '</h3>
                    <p style="font-size: 14px; color: #888; ' . $message_style . '">' . $last_message . '</p> 
                </div>
            </a>';
        }
    } else {
        echo '<p>No conversations found</p>';
    }
} else {
    echo '<p>User not logged in</p>';
}
?>