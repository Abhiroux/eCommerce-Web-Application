<?php
session_start();
require 'db.php'; // Assuming this is the file with the PDO connection

// Check if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

// Assume the user ID is stored in the session after login
$user_id = $_SESSION['user_id'];
$total = 0;

// Calculate total amount
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

try {
    // Begin transaction
    $pdo->beginTransaction();

    // Insert into orders table
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total, status) VALUES (?, ?, 'pending')");
    $stmt->execute([$user_id, $total]);
    $order_id = $pdo->lastInsertId();

    // Insert each cart item into order_items table
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, price, quantity) VALUES (?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $item) {
        $stmt->execute([
            $order_id,
            $item['id'],       // Assuming 'id' is the product ID
            $item['price'],
            $item['quantity']
        ]);
    }

    // Commit transaction
    $pdo->commit();

    // Clear the cart after successful order
    unset($_SESSION['cart']);

    echo "Order placed successfully. Your order ID is: " . $order_id;
    header("Location: ../order_placed.php");   
} catch (PDOException $e) {
    // Rollback transaction in case of error
    $pdo->rollBack();
    echo "Failed to place order: " . $e->getMessage();
}
?>
