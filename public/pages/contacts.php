<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/cropped-trailer-32x32.png" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Контакты - Дженерал Карго</title>

    <style>
        .title {
            font-weight: 800;
        }

        article:first-child {
            margin-bottom: 0px;
        }

        article>div {
            min-height: 188px;
        }
    </style>
</head>

<body>
    <?php
    require_once '../includes/modules/header.php';
    ?>
    <?php
    require_once '../includes/modules/nav.php';
    ?>
    <main>
        <article class="full-width-white">
            <div>
                <h2>КОНТАКТЫ</h2>
                <div>
                    <?php require_once '../includes/contacts-links.php'; ?>
                </div>
            </div>
        </article>
    </main>
    <?php
    require_once '../includes/modules/footer.php';
    ?>
    <script src="../js/animationNav.js"></script>

</body>

</html>