<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    
    if (isset($_SESSION['cart'][$id])) {
        // Remove the specified item from the cart
        unset($_SESSION['cart'][$id]);
    }
}

header("Location: view_cart.php"); // Redirect back to the cart page
exit();
