<?php
require_once('../../../global.php');
session_start();
header('Content-Type: application/json');

$errors = [];

if (empty($_POST['productName'])) {
    $errors['productName'] = 'Product name is required.';
}
if (empty($_POST['slug'])) {
    $errors['slug'] = 'Slug is required.';
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
if (empty($_POST['discountPrice'])) {
    $errors['discountPrice'] = 'Discount price is required.';
}


if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO products (
            name, 
            slug, 
            image, 
            description, 
            brand, 
            conditions, 
            category_id, 
            subcategory_id, 
            price, 
            discount_price,
            country_id,
            city_id,
            user_id
        ) VALUES (
            :productName, 
            :slug, 
            :image, 
            :description, 
            :brand, 
            :conditions, 
            :category, 
            :subcategory, 
            :price, 
            :discountPrice,
            :country,
            :city,
            :user_id
        )");

    $imagePath = '../../../upload/' . basename($_FILES['image']['name']);
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        throw new Exception('Failed to upload image.');
    }

    $stmt->bindParam(':productName', $_POST['productName']);
    $stmt->bindParam(':slug', $_POST['slug']);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':brand', $_POST['brand']);
    $stmt->bindParam(':conditions', $_POST['condition']);
    $stmt->bindParam(':category', $_POST['category']);
    $stmt->bindParam(':subcategory', $_POST['subcategory']);
    $stmt->bindParam(':price', $_POST['price']);
    $stmt->bindParam(':discountPrice', $_POST['discountPrice']);
    $stmt->bindParam(':country', $_POST['country']);
    $stmt->bindParam(':city', $_POST['city']);
    $stmt->bindParam(':user_id', base64_decode($_SESSION['userid']));

    // Execute the statement
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error saving product: ' . $e->getMessage()]);
}
