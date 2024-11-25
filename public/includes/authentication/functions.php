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

function showErrorMessage()
{
    $message = $_SESSION['validation']['error'] ?? '';
    unset($_SESSION['validation']['error']);
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
