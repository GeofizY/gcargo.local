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
        <article class="company-info">
            <section>
                <h2>Редактирование информации о компании</h2>
                <div class="form-items edit-company-info">
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
            </section>
            <section>
                <h2>Добавление новости</h2>
                <form action="../includes/actions/createNews.php" method="post" enctype="multipart/form-data" class="form-items add-news">
                    <div class="fields">
                        <div class="adminPanel-news-title">
                            <label for="title" class="row">Заголовок:</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="<?php echo getCorrectData('title'); ?>"
                                maxlength="255"
                                <?php showErrorAttr('title'); ?>
                                required>
                            <?php if (checkErrorExist('title')): ?>
                                <p class="error"><?php showErrorMessage('title'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="adminPanel-news-author">
                            <label for="author" class="row">Автор:</label>
                            <input
                                type="text"
                                id="author"
                                name="author"
                                value="<?php echo getCorrectData('author'); ?>"
                                maxlength="50"
                                <?php showErrorAttr('author'); ?>
                                required>
                            <?php if (checkErrorExist('author')): ?>
                                <p class="error"><?php showErrorMessage('author'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="adminPanel-news-description">
                            <label for="description" class="row">Краткое описание:</label>
                            <textarea
                                type="text"
                                id="description"
                                name="description"
                                maxlength="500"
                                <?php showErrorAttr('description'); ?>
                                required><?php echo getCorrectData('description'); ?></textarea>
                            <?php if (checkErrorExist('description')): ?>
                                <p class="error"><?php showErrorMessage('description'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="adminPanel-news-content">
                            <label for="content" class="row">Статья:</label>
                            <textarea
                                type="text"
                                id="content"
                                name="content"
                                maxlength="5000"
                                <?php showErrorAttr('content'); ?>
                                required><?php echo getCorrectData('content'); ?></textarea>
                            <?php if (checkErrorExist('content')): ?>
                                <p class="error"><?php showErrorMessage('content'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="adminPanel-news-source">
                            <label for="source" class="row">Источник:</label>
                            <input
                                type="text"
                                id="source"
                                name="source"
                                value="<?php echo getCorrectData('source'); ?>"
                                maxlength="500"
                                <?php showErrorAttr('source'); ?>
                                required>
                            <?php if (checkErrorExist('source')): ?>
                                <p class="error"><?php showErrorMessage('source'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="adminPanel-news-image">
                            <label for="image" class="row">Обложка (не обязательно):</label>
                            <input
                                type="file"
                                id="image"
                                name="image"
                                <?php showErrorAttr('image'); ?>>
                            <?php if (checkErrorExist('image')): ?>
                                <p class="error"><?php showErrorMessage('image'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit">Создать</button>
                </form>
                <?php clearErrors() ?>
            </section>
        </article>
        <?php if (checkStatus()): ?>
            <output class="<?php showStatus('attr'); ?>"><?php showStatus('status'); ?></output>
        <?php endif; ?>
    </main>

    <script src="../js/animationNav.js"></script>
    <script src="../js/notification.js"></script>
    <script src="../js/clearInputErrors.js"></script>
</body>

</html>