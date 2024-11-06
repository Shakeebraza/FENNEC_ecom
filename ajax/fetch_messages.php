<?php
require_once "../global.php";

if (isset($_SESSION['userid'])) {
    $conversationId = $security->decrypt($_POST['conversation_id']) ?? NULL;

    if (isset($conversationId)) {
        $getMesData = $dbFunctions->getDatanotenc('messages', "conversation_id = '$conversationId'", $groupBy = '', $orderBy = '', $orderDirection = 'ASC', $start = 0, $length = 10000);
        $getconData = $dbFunctions->getDatanotenc('conversations', "id = '$conversationId'");
        $getid =$getconData[0]['proid'];
        if($getid){
            $getproData = $dbFunctions->getDatanotenc('products', "id = '$getid'");
            echo'


            <div id="product-info-popup" class="product-info-popup" style=" background-color: #00494f; color: white; padding: 15px; text-align: center; position: fixed; top: 22%; left: 61%; transform: translate(-50%, -50%); z-index: 9999; border-radius: 10px; width: auto; max-width: 90%; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;">
                <div style="display: flex; align-items: center; justify-content: center; flex-wrap: nowrap;">
                    <img id="product-image" src="'.$urlval.$getproData[0]['image'].'" alt="Product Image" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 5px;">
                    <strong id="product-name">Product Name:'.$getproData[0]['name'].'</strong>
                </div>
                <button onclick="hidepopup()" id="close-popup" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer; margin-left: 10px; position: absolute; top: 10px; right: 10px;">&times;</button>
            </div>
            ';

        }

        

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
