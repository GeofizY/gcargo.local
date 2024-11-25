<?php
session_start();

require_once(__DIR__ . '/../includes/db.php');
require_once('../includes/authentication/functions.php');

checkLogin();

if (!isset($_SESSION['user'])) return false;

$userId = $_SESSION['user']['id'] ?? null;

$query = "SELECT * FROM user WHERE id = '$userId'";
$result = $connection->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/cropped-trailer-32x32.png" />

    <title>Admin Panel</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cabinet.css">

</head>

<body>
    <?php
    require_once('../includes/modules/header.php');
    ?>
    <?php
    require_once('../includes/modules/nav.php');
    ?>
    <main>
        <article>
            <div>
                <p class="hello">Здравствуйте, <?php echo $user['login']; ?></p>
                <form action="../includes/authentication/logout.php" method="post">
                    <button class="exit" type="submit">Выйти</button>
                </form>
            </div>
        </article>
        <article class="work-with-db">
            <div>
                <h2>Работа с базой данных</h2>
                <div class="change-db">
                    <form action="../includes/actions/changePhone.php" method="post" class="change-phone">
                        <label for="phone">Изменить контактный номер компании:</label>
                        <div class="input-and-button">
                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                placeholder="+7 (999) 999-99-99">
                            <button type="submit">Изменить</button>
                        </div>
                    </form>
                    <form action="../includes/actions/changeAddress.php" method="post" class="change-address">
                        <label for="address">Изменить адрес компании:</label>
                        <div class="input-and-button">
                            <input
                                type="text"
                                id="address"
                                name="address">
                            <button type="submit">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </main>

    <script src="../js/animationNav.js"></script>
</body>

</html>