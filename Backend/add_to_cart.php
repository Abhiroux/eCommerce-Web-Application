<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = 1; // Default quantity
    $product_image = $_POST['Image'];

    // Check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += 1; // Increase quantity if item already exists
            $item_exists = true;
            break;
        }
    }

    // Add new item if it does not exist
    if (!$item_exists) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $product_quantity,
            'Image'=> $product_image
        ];
    }

    echo json_encode(["status" => "success"]);
}
?>
