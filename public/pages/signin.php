<?php
session_start();

require_once('../includes/db.php');
require_once('../includes/authentication/functions.php');

checkGuest();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/cropped-trailer-32x32.png" />

    <title>Авторизация</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/signin.css">
</head>

<body>

    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="/">
                    <div></div>
                </a>
                <h1>(для персонала)</h1>
            </div>
        </header>
        <main>
            <p class="notice">Для входа в систему введите имя пользователя и пароль:</p>
            <?php if (checkErrorExist('error')): ?>
                <p class="error"><?php showErrorMessage('error'); ?></p>
            <?php endif; ?>

            <form action="../includes/authentication/auth.php" method="post">
                <div class="fields">
                    <div class="row">
                        <label for="login">Логин:</label>
                        <input
                            type="text"
                            id="login"
                            name="login"
                            value="<?php echo getCorrectData('login'); ?>"
                            <?php showErrorAttr('login'); ?>
                            require>
                    </div>
                    <div class="row">
                        <label for="password">Пароль:</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            <?php showErrorAttr('password'); ?>
                            require>
                    </div>
                </div>
                <button type="submit">Войти</button>
            </form>
            <?php clearErrors() ?>
        </main>
    </div>

    <script src="../js/clearInputErrors.js"></script>
</body>

</html>