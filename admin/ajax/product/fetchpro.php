<?php
require_once('../../../global.php');

function getProductsWithDetails($pdo, $security, $urlval, $page, $limit) {
    $offset = ($page - 1) * $limit;

    $sql = "
        SELECT 
            p.id AS product_id,
            p.name AS product_name,
            p.slug AS product_slug,
            p.description AS product_description,
            p.image AS product_image,
            p.price AS product_price,
            p.product_type AS product_type,
            p.discount_price AS product_discount_price,
            c.category_name AS category_name,
            s.subcategory_name AS subcategory_name,
            ci.name AS city_name,
            co.name AS country_name
        FROM 
            products p
        LEFT JOIN 
            categories c ON p.category_id = c.id
        LEFT JOIN 
            subcategories s ON p.subcategory_id = s.id
        LEFT JOIN 
            cities ci ON p.city_id = ci.id
        LEFT JOIN 
            countries co ON p.country_id = co.id
        WHERE 
            p.is_enable = 1
        ORDER BY 
            p.created_at DESC
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();


    $getproduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalSql = "SELECT COUNT(*) AS total FROM products WHERE is_enable = 1";
    $totalStmt = $pdo->prepare($totalSql);
    $totalStmt->execute();
    $total = $totalStmt->fetchColumn();


    $response = [
        'products' => [],
        'total' => $total
    ];

   
    if ($getproduct) {
        foreach ($getproduct as $pro) {
 
            $image = $urlval . $pro['product_image'];
            $response['products'][] = [
                'id' => $pro['product_id'],
                'name' => $pro['product_name'],
                'slug' => $pro['product_slug'],
                'description' => $pro['product_description'],
                'image' => $image,
                'price' => $pro['product_price'],
                'discount_price' => $pro['product_discount_price'],
                'product_type' => $pro['product_type'],
                'category' => $pro['category_name'],
                'subcategory' => $pro['subcategory_name'],
                'city' => $pro['city_name'],
                'country' => $pro['country_name'],
            ];
        }
    }

    return $response;
}

header('Content-Type: application/json');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;

$response = getProductsWithDetails($pdo, $security, $urlval, $page, $limit);


echo json_encode($response);
