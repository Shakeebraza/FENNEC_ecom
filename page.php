<?php
require_once 'global.php'; 

// Include header
include_once 'header.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $query = "SELECT * FROM pages WHERE slug = :slug LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    
    // Fetch the page data
    $page = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($page) {
        ?>
        <div class="container my-5">
            <!-- Directly output the subcontent, allowing HTML to render properly -->
            <?php echo html_entity_decode($page['subcontent']); ?> 
        </div>
        <?php
    } else {
        // Page not found, handle it
        echo "<h1 class='text-danger'>Page Not Found</h1>";
    }
} else {
    // No slug provided, handle it
    echo "<h1 class='text-warning'>No Page Selected</h1>";
}

// Include footer
include_once 'footer.php';
?>
