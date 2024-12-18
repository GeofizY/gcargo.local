<?php
session_start();

require_once('../db.php');
require_once('../authentication/functions.php');

$_SESSION['validation'] = [];
$_SESSION['notification'] = [];

$name = trim($_POST['name']) ?? null;
$phone = trim($_POST['phone']) ?? null;
$email = trim($_POST['email']) ?? null;


foreach ($_POST as $key => $value) {
    if (empty(trim($value))) {
        setErrorText($key, 'Поле не может быть пустым');
    }
}

checkLength('name', $name, 50);
if (iconv_strlen(preg_replace("/[^\d]/", '', $phone)) != 11) {
    setErrorText($phone, "Неверно набран номер");
}
checkLength('email', $email, 319);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setErrorText('email', 'Неверный формат почты');
}

if (!empty($_SESSION['validation'])) {
    setNotification('status', 'Ошибка при заполнении полей');
    setNotification('attr', 'failed');
    redirect('/pages/contacts.php');
} else {
    $phone = preg_replace("/[^\d]/", '', $phone);
    $query = "INSERT INTO appeal (name, phone, email) VALUES ('$name', '$phone', '$email')";
    if ($connection->query($query)) {
        setNotification('status', 'Успех');
        setNotification('attr', 'success');
        redirect('/pages/contacts.php');
    } else {
        setNotification('status', 'Неудача');
        setNotification('attr', 'failed');
        redirect('/pages/contacts.php');
    }
}
