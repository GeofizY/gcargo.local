<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/cropped-trailer-32x32.png" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Дженерал Карго - Логистическая компания</title>
</head>

<body>
    <?php
    require_once './includes/modules/header.php';
    ?>
    <?php
    require_once './includes/modules/nav.php';
    ?>
    <main>
        <article class="full-width-white">
            <div>
                <h2>GENERAL CARGO</h2>
                <div>
                    <p>Добро пожаловать на сайт логистической компании ООО «<a href="#">ДЖЕНЕРАЛ КАРГО</a>»!</p>
                    <p>Основным направлением деятельности нашей логистической компании ООО «<a href="#">ДЖЕНЕРАЛ
                            КАРГО</a>» являются транспортные перевозки сборных грузов по всей территории РФ в торговые
                        сети, частные точки из Санкт-Петербурга.</p>
                </div>
            </div>
        </article>
        <article class="full-width-white">
            <div>
                <h2>О НАС</h2>
                <?php require_once './includes/about-info.php'; ?>
            </div>
        </article>
        <article class="full-width-white">
            <div>
                <h2>НОВОСТИ</h2>
                <div>
                    <?php
                    require './includes/showShortNews.php';
                    ?>
                </div>
            </div>
        </article>
        <article class="full-width-white">
            <div>
                <h2>КОНТАКТЫ</h2>
                <div>
                    <p>Наши контакты</p>
                </div>
            </div>
        </article>
    </main>
    <?php
    require_once './includes/modules/footer.php';
    ?>

    <script src="./js/animationNav.js"></script>
</body>

</html>