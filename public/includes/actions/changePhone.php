<?php
session_start();

require_once('../db.php');
require_once('../authentication/functions.php');

$phoneNumber = trim($_POST['phone']);

$query = "UPDATE contacts SET phone = '$phoneNumber' WHERE id = 1";
$result = mysqli_query($connection, $query);

redirect('/pages/adminPanel.php');
