<?php
session_start();

require_once('../db.php');
require_once('functions.php');

$_SESSION['validation'] = [];
$_SESSION['correct'] = [];

$login = trim($_POST['login']);
$password = trim($_POST['password']);

saveCorrectData('login', $login);

if (empty($login)) {
    setErrorText('login', 'Введена неправильная комбинация Логин - Пароль');
}

if (empty($password)) {
    setErrorText('password', 'Введена неправильная комбинация Логин - Пароль');
}

if (!empty($_SESSION['validation']['error'])) {
    redirect('/pages/signin.php');
} else {
    $query = "SELECT * FROM user WHERE login = '$login'";
    $result = $connection->query($query);
    $user = $result->fetch_assoc();

    if (!$user) {
        setErrorText('login', 'Пользователь с таким Логином незарегистрирован в системе');
        redirect('/pages/signin.php');
    }

    if (!password_verify($password, $user['password'])) {
        setErrorText('password', 'Неправильный Логин или Пароль');
        redirect('/pages/signin.php');
    }

    $_SESSION['user']['id'] = $user['id'];
    redirect('/pages/adminPanel.php');
}
