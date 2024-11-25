<?php
session_start();

require_once('../db.php');
require_once('../authentication/functions.php');

$address = trim($_POST['address']);

$query = "UPDATE contacts SET address = '$address' WHERE id = 1";
$result = mysqli_query($connection, $query);

redirect('/pages/adminPanel.php');
