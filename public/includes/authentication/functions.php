<?php

// Функции на стороне клиента

function checkErrorExist(string $name): bool
{
    return isset($_SESSION['validation'][$name]);
}

function showErrorAttr(string $name)
{
    echo isset($_SESSION['validation'][$name]) ? 'aria-invalid="true"' : 'aria-invalid="false"';
}

function showErrorMessage(string $name)
{
    $message = $_SESSION['validation'][$name] ?? '';
    unset($_SESSION['validation'][$name]);
    echo $message;
}

function checkStatusOfNews(): bool
{
    return isset($_SESSION['notification']['status']);
}

function setNotification(string $name, string $text)
{
    $_SESSION['notification'][$name] = $text;
}

function showStatusOfNews($name)
{
    $message = $_SESSION['notification'][$name] ?? '';
    unset($_SESSION['notification'][$name]);
    echo $message;
}

function clearErrors()
{
    $_SESSION['validation'] = [];
}

function saveCorrectData(string $name, mixed $value)
{
    $_SESSION['correct'][$name] = $value;
}

function getCorrectData(string $name): string
{
    $data = $_SESSION['correct'][$name] ?? '';
    unset($_SESSION['correct'][$name]);
    return $data;
}

function clearValues()
{
    $_SESSION['correct'] = [];
}

// Функции на стороне сервера

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function setErrorText(string $name, string $text)
{
    $_SESSION['validation'][$name] = $text;
    $_SESSION['validation']['error'] = $text;
}

function checkLength(string $name, string $value, int $length)
{
    if (iconv_strlen($value) > $length) {
        setErrorText($name, "Поле не может превышать $length символов");
    }
}

function checkLogin()
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/pages/signin.php');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/pages/adminPanel.php');
    }
}
