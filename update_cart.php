<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $quantity = intval($_POST['quantity']);
    
    if (isset($_SESSION['cart'][$id])) {
        // Update the quantity of the specified item
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }
}

header("Location: view_cart.php"); // Redirect back to the cart page
exit();
