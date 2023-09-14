<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "football";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // اضف هنا أي إعدادات إضافية إذا كنت بحاجة إليها
} catch (PDOException $e) {
    die("خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
