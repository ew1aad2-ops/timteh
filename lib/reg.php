<?php
//проверка на знаки

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$clientname = trim(filter_var($_POST['clientname'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$clientpassword = trim(filter_var($_POST['clientpassword'], FILTER_SANITIZE_SPECIAL_CHARS));
//echo $email;
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
if (strlen($email) < 4) {
    echo "Mail error";
    exit;
}
if (strlen($clientpassword) < 4) {
    echo "Password error";
    exit;
}

//password cash
$salt = "190530222";
$clientpassword = md5($salt.$clientpassword);
 //DB
 require "db.php";

$stmt = $pdo->prepare("INSERT INTO users (login, username, email, password) VALUES (?,?,?,?)");
//echo "test успешно!";

$stmt->execute([$login, $clientname, $email, $clientpassword]);
//echo "zagruzil успешно!";

header('location: /');
?>