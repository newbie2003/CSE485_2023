<?php $servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "btth01_cse485";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo"thanh cong";
} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}?>