<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/cropped-trailer-32x32.png" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>О нас - Дженерал Карго</title>

    <style>
        .title {
            font-weight: 800;
        }

        main {
            background-image: none;
        }

        .logo {
            display: flex;
            justify-content: center;
            background-color: #fafafa;
            border-bottom: solid 1px #ddd;
        }

        article:first-child {
            margin-bottom: 0px;
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
        <div class="logo">
            <img src="../images/logo2.jpg" alt="Логотип">
        </div>
        <article class="full-width-white">
            <div>
                <h2>О НАС</h2>
                <?php require_once '../includes/about-info.php'; ?>
            </div>
        </article>
    </main>
    <?php
    require_once '../includes/modules/footer.php';
    ?>
    <script src="../js/animationNav.js"></script>

</body>

</html>