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
        if (!empty($filters['pid'])) {
            $sql .= " AND p.id LIKE :id";
            $params[':id'] = '%' . $filters['pid'] . '%';
        }
        if (!empty($filters['product_name'])) {
            $sql .= " AND p.name LIKE :product_name";
            $params[':product_name'] = '%' . $filters['product_name'] . '%';
        }
        if (!empty($filters['slug'])) {
            $sql .= " AND p.slug LIKE :slug";
            $params[':slug'] = '%' . $filters['slug'] . '%';
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
        $sql = "SELECT p.*, c.category_name, c.slug, c.category_image 
                FROM $table AS p
                JOIN categories AS c ON p.category_id = c.id
                WHERE p.name LIKE :query 
                OR p.brand LIKE :query 
                OR p.description LIKE :query 
                OR c.category_name LIKE :query
                LIMIT 10";
    
        $stmt = $this->pdo->prepare($sql);
        $searchTerm = '%' . $query . '%';
        $stmt->bindParam(':query', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    function getCountryCityPairs() {
        $query = "
        SELECT countries.id AS country_id, countries.name AS country_name, 
               cities.id AS city_id, cities.name AS city_name 
        FROM countries
        INNER JOIN cities ON countries.id = cities.country_id
        ORDER BY countries.name, cities.name";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllcatandSubcat($categoryId = null) {
        try {
            $categoriesQueryStr = "SELECT * FROM categories WHERE is_show = 1 AND is_enable = 1";
            
            if ($categoryId !== null) {
                $categoriesQueryStr .= " AND id = :category_id";
            }
            
            $categoriesQuery = $this->pdo->prepare($categoriesQueryStr);
            if ($categoryId !== null) {
                $categoriesQuery->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            }
            
            $categoriesQuery->execute();
            $categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);
            $result = [
                'status' => 'success',
                'data' => []
            ];
            
            foreach ($categories as $category) {
                $subcategoriesQuery = $this->pdo->prepare("SELECT * FROM subcategories WHERE category_id = :category_id");
                $subcategoriesQuery->bindParam(':category_id', $category['id'], PDO::PARAM_INT);
                $subcategoriesQuery->execute();
                $subcategories = $subcategoriesQuery->fetchAll(PDO::FETCH_ASSOC);
                
                $result['data'][] = [
                    'category_name' => $category['category_name'],
                    'subcategories' => $subcategories
                ];
            }
            
            return $result;
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function getProductDetailsBySlug($slug, $userId = null) {
        $sql = "
            SELECT 
                p.id AS product_id,
                p.name AS product_name,
                p.description AS product_description,
                p.price,
                p.image as proimage,
                p.user_id,
                p.category_id,
                p.discount_price,
                p.country_id,
                p.city_id,
                p.brand,
                c.category_name,
                c.slug AS catslug,
                s.subcategory_name,
                cou.name AS con_name,
                city.name AS city_name,
                pi.image_path AS image_path,
                CASE WHEN f.user_id IS NOT NULL THEN 1 ELSE 0 END AS is_favorited
            FROM 
                products p
            LEFT JOIN 
                categories c ON p.category_id = c.id
            LEFT JOIN 
                subcategories s ON p.subcategory_id = s.id
            LEFT JOIN 
                product_images pi ON p.id = pi.product_id
            LEFT JOIN 
                favorites f ON p.id = f.product_id " . ($userId ? "AND f.user_id = :user_id" : "") . "
            LEFT JOIN 
                countries cou ON cou.id = p.country_id
            LEFT JOIN 
                cities city ON city.id = p.city_id
            WHERE 
                p.slug = :slug
        ";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':slug', $slug);
    
        if ($userId) {
            $stmt->bindParam(':user_id', $userId);
        }
    
        $stmt->execute();
        $productDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($productDetails) {
            $firstProduct = $productDetails[0];
            $images = array_column($productDetails, 'image_path');
            
            return [
                'product' => $firstProduct,
                'gallery_images' => $images,
                'is_favorited' => $firstProduct['is_favorited'],
                'location' => $firstProduct['con_name'] . ' | ' . $firstProduct['city_name']
            ];
        }
    
        return null;
    }
    
    
    public function toggleFavorite($productId, $userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM favorites WHERE product_id = ? AND user_id = ?");
        $stmt->execute([$productId, $userId]);
        
        if ($stmt->rowCount() > 0) {
            $stmt = $this->pdo->prepare("DELETE FROM favorites WHERE product_id = ? AND user_id = ?");
            $stmt->execute([$productId, $userId]);
            return false; 
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO favorites (product_id, user_id) VALUES (?, ?)");
            $stmt->execute([$productId, $userId]);
            return true;
        }
    }
    public function getRelatedProducts($categoryId, $productId, $limit = 5) {
        $sql = "
            SELECT 
                p.id AS product_id,
                p.name AS title,
                p.price,
                p.image AS image
            FROM 
                products p
            WHERE 
                p.category_id = :categoryId
                AND p.id != :productId
            LIMIT :limit
        ";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getUserFavorites($userId) {
     
        $query = "
            SELECT p.id, p.name, p.slug, p.description, p.image, p.price
            FROM favorites f
            INNER JOIN products p ON f.product_id = p.id
            WHERE f.user_id = :user_id
            ORDER BY f.created_at DESC
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $count = count($favorites);
        return [
            'count' => $count,
            'favorites' => $favorites
        ];
    }

    function getProductsForUser($userId) {
        if($userId){
        $query = "
            SELECT id, name, slug, description, image, price, created_at
            FROM products
            WHERE user_id = :user_id AND is_enable = 1 AND status = 'active'
            ORDER BY created_at DESC
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (!empty($products)) {
            $this->displayProducts($products);
        } else {
            throw new Exception("No products found for user with ID: " . htmlspecialchars($userId));
        }
    }else{
        return "No products found for user with ID:";
    }
    }
    
    function displayProducts($products) {
    
        foreach ($products as $product) {
            echo '
                <div class="col-md-4 mb-4">
                  <div class="card product-card">
                    <img
                      src="' . htmlspecialchars($product['image']) . '"
                      class="card-img-top"
                      alt="' . htmlspecialchars($product['name']) . '"
                    />
                    <div class="card-body">
                      <h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>
                      <p class="card-text">' . htmlspecialchars($product['description']) . '</p>
                      <p class="card-text"><strong>Price:</strong> $' . number_format($product['price'], 2) . '</p>
                      <p class="card-text">
                        <small class="text-muted">Listed ' . $this->dbfun->time_ago($product['created_at']) . '</small>
                      </p>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-button btn-sm">Edit</button>
                       <button class="btn btn-button btn-sm btn-delete" data-product-id="' . $this->security->encrypt($product['id']). '">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
            ';
        }
    }
}

?>