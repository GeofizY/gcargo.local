<?php
session_start();

require_once('../db.php');
require_once('../authentication/functions.php');

$_SESSION['validation'] = [];
$_SESSION['correct'] = [];
$_SESSION['notification'] = [];

$title = trim($_POST['title']) ?? null;
$author = trim($_POST['author']) ?? null;
$description = trim($_POST['description']) ?? null;
$content = trim($_POST['content']) ?? null;
$source = trim($_POST['source']) ?? null;
$image = $_FILES['image'] ?? null;

saveCorrectData('title', $title);
saveCorrectData('author', $author);
saveCorrectData('description', $description);
saveCorrectData('content', $content);
saveCorrectData('source', $source);


foreach ($_POST as $key => $value) {
    if (empty(trim($value))) {
        setErrorText($key, 'Поле не может быть пустым');
    }
}

checkLength('title', $title, 255);
checkLength('author', $author, 50);
checkLength('description', $description, 500);
checkLength('content', $content, 5000);
checkLength('source', $source, 500);


if (!empty($image['tmp_name']) && $image['error'] === UPLOAD_ERR_OK) {
    $types = ['image/jpg', 'image/jpeg', 'image/png'];

    if (!in_array($image['type'], $types)) {
        setErrorText('image', 'Допустимые расширения: jpg, jpeg, png');
    }

    if (($image['size'] / 1000000) >= 2) {
        setErrorText('image', 'Максимальный размер 2Мб');
    }
}

if (!empty($image['tmp_name']) && $image['error'] === UPLOAD_ERR_OK) {
    if (!is_dir('../../images/newsCovers/')) {
        mkdir('../../images/newsCovers/', 0777, true);
    }

    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $fileName = 'cover_' . time() . ".$ext";

    move_uploaded_file($image['tmp_name'], '../../images/newsCovers/' . $fileName);
} else {
    $fileName = null;
}

if (!empty($_SESSION['validation'])) {
    redirect('/pages/adminPanel.php');
} else {
    $source = "<p>$source</p>";
    if (!empty($fileName)) $fileName = "../images/newsCovers/$fileName";
    $query = "INSERT INTO news (title, author, date, description, content, source, image) VALUES ('$title', '$author', NOW(), '$description', '$content', '$source', '$fileName')";
    if ($connection->query($query)) {
        setNotification('status', 'Успех');
        setNotification('attr', 'success');
        redirect('/pages/adminPanel.php');
    } else {
        setNotification('status', 'Неудача');
        setNotification('attr', 'failed');
        redirect('/pages/adminPanel.php');
    }
}
