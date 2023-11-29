<?php
session_start();
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra đăng nhập
    $stmt = $pdo->prepare("SELECT username, password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Đăng nhập thành công
        $_SESSION['username'] = $user['username'];
        header("Location: adIndex.php"); // Chuyển hướng đến trang chính hoặc trang khác
        exit();
    } else {
        // Đăng nhập không thành công
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>