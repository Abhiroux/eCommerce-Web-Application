<?php
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$bool = $stmt->execute([$name, $email, $password]);
if($bool==TRUE){
    header("Location: ../registration_success.html");
}

?>
