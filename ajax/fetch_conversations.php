<?php
require_once "../global.php";

if (isset($_SESSION['userid'])) {
    $user_id = base64_decode($_SESSION['userid']);

    $query = "
    SELECT c.*, 
           p.name AS product_name,
           p.image AS product_image,
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
    LEFT JOIN products p ON p.id = c.proid  -- Updated column name to 'proid'
    WHERE c.user_one = :user_id OR c.user_two = :user_id
    ORDER BY c.id DESC
";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $conversations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($conversations) {
        foreach ($conversations as $conversation) {
            $product_name = $conversation['product_name'];
            $product_image = $conversation['product_image'] ? $conversation['product_image'] : 'images/default_product.jpg';  // Default product image if not available

            $conversation_id = $security->encrypt($conversation['id']);
            $last_message = $conversation['last_message'] ? $conversation['last_message'] : 'Send a message to start the conversation';
            $last_message_read = $conversation['last_message_read']; 
            $last_sender_id = $conversation['last_sender_id']; 

            if ($last_sender_id != base64_decode($_SESSION['userid'])) {
                $message_style = ($last_message_read == 0) ? 'font-weight: bold;' : '';
            } else {
                $message_style = '';
            }

            echo '
            <a href="#" class="d-flex align-items-center" style="text-decoration: none; padding: 10px; border-bottom: 1px solid #ddd;" onclick="loadMessages(\'' . $conversation_id . '\')">
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="' . $urlval . $product_image . '" alt="product img" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 style="font-size: 16px; margin: 0; color: #00494f;">' . $product_name . '</h3>
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