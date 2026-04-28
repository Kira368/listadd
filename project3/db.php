<?php
$host = "MySQL-8.4"; // как в config.php
$user = "root";
$pass = "";
$db   = "table1";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

echo "Успешное подключение!";
?>
