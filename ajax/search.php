<?php
require_once "../global.php";

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $results = $productFun->searchData('products', $query);

    if ($results) {
        echo ' <div class="suggestions" id="suggestions">';
        foreach ($results as $result) {
            echo'<div class="suggestion-item">'.$result['name'].'</div>';
        }
        echo '</div>';
    } else {
        echo '<div>No results found</div>';
    }
}
?>
