<?php
$host = 'MySQL-8.2';
$dbname = 'gcargo';
$username = 'root';
$password = '';

$connection = new mysqli($host, $username, $password, $dbname);

if (!$connection) {
    die("Не удалось подключиться к базе данных!");
}
