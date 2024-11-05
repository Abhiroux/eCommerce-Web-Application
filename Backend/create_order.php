<?php
require 'db.php';

session_start();
$user_id = $_SESSION['user_id'];
$cart = json_decode($_POST['cart'], true); // Expecting JSON array of products

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert into `orders` table
$stmt = $pdo->prepare("INSERT INTO orders (user_id, total, status) VALUES (?, ?, 'pending')");
$stmt->execute([$user_id, $total]);
$order_id = $pdo->lastInsertId();

// Insert each item into `order_items` table
foreach ($cart as $item) {
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->execute([$order_id, $item['product_id'], $item['quantity'], $item['price']]);
}

echo "Order placed successfully";
?>
