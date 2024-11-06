<?php
session_start();

var_dump($_SESSION['cart']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['quantity'])) {
    $productId = $_POST['id'];
    $quantity = max(1, (int)$_POST['quantity']); // Ensure quantity is at least 1

    // Update the cart if the product exists
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
    }

    header('Location: view_cart.php');
    exit;
}

?>
