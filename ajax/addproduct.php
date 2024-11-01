<?php
require_once('../global.php');
header('Content-Type: application/json');

$errors = [];


if (empty($_POST['productName'])) {
    $errors['productName'] = 'Product name is required.';
}
if (empty($_POST['slug'])) {
    $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $_POST['productName'])) . '-' . substr(md5(uniqid()), 0, 6);
    $_POST['slug'] = $slug;
}
if ($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
    $errors['image'] = 'Image is required.';
}
if (empty($_POST['description'])) {
    $errors['description'] = 'Description is required.';
}
if (empty($_POST['category'])) {
    $errors['category'] = 'Category is required.';
}
if (empty($_POST['subcategory'])) {
    $errors['subcategory'] = 'Subcategory is required.';
}
if (empty($_POST['brand'])) {
    $errors['brand'] = 'Brand is required.';
}
if (empty($_POST['condition'])) {
    $errors['condition'] = 'Condition is required.';
}
if (empty($_POST['country'])) {
    $errors['country'] = 'Country is required.';
}
if (empty($_POST['city'])) {
    $errors['city'] = 'City is required.';
}
if (empty($_POST['price'])) {
    $errors['price'] = 'Price is required.';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $imagePath = '../upload/product/' . basename($_FILES['image']['name']);
    $imagePathSave = 'upload/product/' . basename($_FILES['image']['name']);
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        throw new Exception('Failed to upload image.');
    }

    $productData = [
        'name' => $_POST['productName'],
        'slug' => $_POST['slug'],
        'image' => $imagePathSave,
        'description' => $_POST['description'],
        'brand' => $_POST['brand'],
        'conditions' => $_POST['condition'],
        'category_id' => $_POST['category'],
        'subcategory_id' => $_POST['subcategory'],
        'price' => $_POST['price'],
        'discount_price' => "",
        'country_id' => $_POST['country'],
        'city_id' => $_POST['city'],
        'user_id' => base64_decode($_SESSION['userid']),
    ];

    $result = setData('products', $productData);

    if (!$result['success']) {
        echo json_encode($result);
        exit;
    }

    $productId = $pdo->lastInsertId();

    if (isset($_FILES['gallery'])) {
        $galleryStmt = $pdo->prepare("
            INSERT INTO product_images (product_id, image_path, created_at) 
            VALUES (:product_id, :image_path, current_timestamp())");

        foreach ($_FILES['gallery']['tmp_name'] as $key => $tmpName) {
            if ($_FILES['gallery']['error'][$key] === UPLOAD_ERR_OK) {
                $galleryImagePath = '../upload/productgallery/' . basename($_FILES['gallery']['name'][$key]);
                $galleryImagePathSave = 'upload/productgallery/' . basename($_FILES['gallery']['name'][$key]);
                if (move_uploaded_file($tmpName, $galleryImagePath)) {
                    $galleryStmt->bindValue(':product_id', $productId);
                    $galleryStmt->bindValue(':image_path', $galleryImagePathSave);
                    $galleryStmt->execute();
                }
            }
        }
    }

    echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error saving product: ' . $e->getMessage()]);
}

function setData($tableName, $data) {
    global $pdo;
    $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName);

    $sanitizedData = [];
    foreach ($data as $key => $value) {
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $sanitizedData[$key] = $value;
    }

    try {
        $columns = implode('`, `', array_keys($sanitizedData));
        $placeholders = ':' . implode(', :', array_keys($sanitizedData));
        $stmt = $pdo->prepare("INSERT INTO `$tableName` (`$columns`) VALUES ($placeholders)");

        $stmt->execute($sanitizedData);
        return ['success' => true, 'message' => 'Data saved successfully.'];
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return ['success' => false, 'message' => 'Duplicate entry error: The email or field you are trying to use already exists.'];
        }
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    }
}
?>
