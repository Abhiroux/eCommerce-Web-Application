<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = 1; // Default quantity
    $product_image = $_POST['Image'];

    // Check if item already exists in cart and update quantity if so
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1; // Increase quantity
    } else {
        // Add new item if it does not exist
        $_SESSION['cart'][$product_id] = [
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
