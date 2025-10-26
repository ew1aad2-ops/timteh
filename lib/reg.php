<?php
//переменные
$host = 'localhost';
$dbname = 'ew1aadgy_5';
$username = 'ew1aadgy_5';
$password = 'Dd250283_';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Настройки PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    echo "Подключение успешно!";
} catch(PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

$stmt = $pdo->prepare("INSERT INTO user1 (loginA) VALUES (?)");
echo "test успешно!";

$stmt->execute(['John Doe']);
    ?>