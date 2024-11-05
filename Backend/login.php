<?php
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    session_start();
    $_SESSION["loggedIn"]=true;
    header("Location: ../dashboard.php");
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name']=$user['name'];
    $_SESSION['user_email']=$user['email'];
    return;
} else {
    $error = "Invlid Credentials";
    header("Location: ../login.html?error=".urlencode($error));
    exit();
}
?>
