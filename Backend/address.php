<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id']; // Assuming you have the user ID in session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];

    // Check if the user already has an address
    $stmt = $pdo->prepare("SELECT id FROM addresses WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $address = $stmt->fetch();

    if ($address) {
        // Update existing address
        $stmt = $pdo->prepare("UPDATE addresses SET address_line1 = ?, address_line2 = ?, city = ?, state = ?, postal_code = ?, country = ? WHERE user_id = ?");
        $stmt->execute([$address_line1, $address_line2, $city, $state, $postal_code, $country, $user_id]);
    } else {
        // Insert new address
        $stmt = $pdo->prepare("INSERT INTO addresses (user_id, address_line1, address_line2, city, state, postal_code, country) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $address_line1, $address_line2, $city, $state, $postal_code, $country]);
    }

    echo "Address saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Address</title>
</head>
<body>
    <form method="POST">
        <label>Address Line 1:</label>
        <input type="text" name="address_line1" required><br>

        <label>Address Line 2:</label>
        <input type="text" name="address_line2"><br>

        <label>City:</label>
        <input type="text" name="city" required><br>

        <label>State:</label>
        <input type="text" name="state" required><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" required><br>

        <label>Country:</label>
        <input type="text" name="country" required><br>

        <button type="submit">Save Address</button>
    </form>
</body>
</html>
