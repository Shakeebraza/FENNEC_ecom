<?php
Class Productfun{
   
    private $pdo;
    private $security;
    private $dbfun;
    private $urlval;

    public function __construct($database, $security, $dbfun, $urlval){
        $this->pdo = $database->getConnection();  
        $this->security = $security;             
        $this->dbfun = $dbfun;                  
        $this->urlval = $urlval;
    }
    function getProductsWithDetails($page, $limit, $filters = []) {
        $offset = ($page - 1) * $limit;
        $sql = "
            SELECT 
                p.id AS product_id,
                p.name AS product_name,
                p.slug AS product_slug,
                p.description AS product_description,
                p.image AS product_image,
                p.price AS product_price,
                p.date AS productdate,
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
        ";
    
        $params = [];
        if (!empty($filters['product_name'])) {
            $sql .= " AND p.name LIKE :product_name";
            $params[':product_name'] = '%' . $filters['product_name'] . '%';
        }
        if (!empty($filters['min_price'])) {
            $sql .= " AND p.price >= :min_price";
            $params[':min_price'] = $filters['min_price'];
        }
        if (!empty($filters['max_price'])) {
            $sql .= " AND p.price <= :max_price";
            $params[':max_price'] = $filters['max_price'];
        }
        if (!empty($filters['category'])) {
            $sql .= " AND p.category_id = :category";
            $params[':category'] = $filters['category'];
        }
        if (!empty($filters['subcategory'])) {
            $sql .= " AND p.subcategory_id = :subcategory";
            $params[':subcategory'] = $filters['subcategory'];
        }
        if (!empty($filters['product_type'])) {
            $sql .= " AND p.product_type = :product_type";
            $params[':product_type'] = $filters['product_type'];
        }
        if (!empty($filters['country'])) {
            $sql .= " AND p.country_id = :country";
            $params[':country'] = $filters['country'];
        }
        if (!empty($filters['city'])) {
            $sql .= " AND p.city_id = :city";
            $params[':city'] = $filters['city'];
        }
    
        $sql .= " ORDER BY p.created_at DESC LIMIT :limit OFFSET :offset";
    
        $stmt = $this->pdo->prepare($sql);
    
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    
        $getproduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $totalSql = "SELECT COUNT(*) AS total FROM products WHERE is_enable = 1";
        $totalStmt = $this->pdo->prepare($totalSql);
        $totalStmt->execute();
        $total = $totalStmt->fetchColumn();
    
        $response = [
            'products' => [],
            'total' => $total
        ];

        if ($getproduct) {
            foreach ($getproduct as $pro) {
                $image = $this->urlval . $pro['product_image'];
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
                    'date' => $pro['productdate'],
                ];
            }
        }
    
        return $response;
    }
    public function searchData($table, $query) {
        $sql = "SELECT * FROM $table 
                WHERE name LIKE :query 
                OR brand LIKE :query 
                OR description LIKE :query 
                LIMIT 10";

        $stmt = $this->pdo->prepare($sql);
        $searchTerm = '%' . $query . '%';
        $stmt->bindParam(':query', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>