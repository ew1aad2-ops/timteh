<?php
//проверка на знаки

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$clientname = trim(filter_var($_POST['clientname'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$clientpassword = trim(filter_var($_POST['clientpassword'], FILTER_SANITIZE_SPECIAL_CHARS));
echo $email;
//echo $clientname;


//свои проверки
if (strlen($login) < 4) {
    echo "login error";
    exit;
}
if (strlen($clientname) < 4) {
    echo "Name error";
    exit;
}
if (strlen($email) < 4 ) {
    echo "Mail error";
    exit;
}
if (strlen($clientpassword) < 4) {
    echo "Password error";
    exit;
}






$host = 'localhost';
$dbname = 'ew1aadgy_5';
$username = 'ew1aadgy_5';
$password = 'Dd250283';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Настройки PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    echo "Подключение успешно!";
} catch(PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

$stmt = $pdo->prepare("INSERT INTO users (login, username, email, password) VALUES (?,?,?,?)");
echo "test успешно!";

$stmt->execute([$login, $clientname, $email, $password]);
  echo "zagruzil успешно!";  
?>