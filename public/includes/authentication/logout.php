<?php
session_start();
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['user']['id']);
    redirect('/pages/signin.php');
}

redirect('/pages/adminPanel.php');
