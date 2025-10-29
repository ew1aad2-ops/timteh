<?php

//получаем логин и пароль
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $clientpassword = trim(filter_var($_POST['clientpassword'], FILTER_SANITIZE_SPECIAL_CHARS));

    //проверка на к-во знаков
    if (strlen($login) < 4) {
    echo "login error";
    exit;
    }
    if (strlen($clientpassword) < 4) {
    echo "Password error";
    exit;
}
//Password hash
$salt = "190530222";
$clientpassword = md5($salt.$clientpassword);

// подключаемся к БД
require "db.php";

//Auth user
$stmt = $pdo->prepare( 'SELECT id FROM users WHERE login = ? AND  password =?');
echo "test успешно!";

$stmt->execute([$login, $clientpassword]);
echo "Nice";


//ПРОВЕРКА - сколько записей возвращено
if ($stmt->rowCount() == 0) {
    echo "This user - not reggistratad";
}
    else {
        echo "Their good!";

        header ('Location: /user.php');
}

