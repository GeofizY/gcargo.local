<?php

require_once('../includes/db.php');

$news_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($news_id > 0) {
    $stmt = $connection->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $news = $result->fetch_assoc();

    if ($news) {
        $stmt_prev = $connection->prepare("SELECT id, title FROM news WHERE date < ? ORDER BY date DESC LIMIT 1");
        $stmt_prev->bind_param('s', $news['date']);
        $stmt_prev->execute();
        $result_prev = $stmt_prev->get_result();
        $prev_news = $result_prev->fetch_assoc();

        $stmt_next = $connection->prepare("SELECT id, title FROM news WHERE date > ? ORDER BY date ASC LIMIT 1");
        $stmt_next->bind_param('s', $news['date']);
        $stmt_next->execute();
        $result_next = $stmt_next->get_result();
        $next_news = $result_next->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="ru">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="../images/cropped-trailer-32x32.png" />
            <link rel="stylesheet" href="../css/reset.css">
            <link rel="stylesheet" href="../css/news.css">

            <title><?php echo $news['title'] ?></title>

        </head>

        <body>
            <?php
            require_once '../includes/modules/header.php';
            ?>
            <?php
            require_once '../includes/modules/nav.php';
            ?>
            <main>

                <?php
                if ($news['image'] != null) {
                ?>
                    <div class="logo">
                        <img src="<?php echo $news['image'] ?>" alt="Обложка">
                    </div>
                <?php
                }
                ?>

                <div class="full-width-white">
                    <div class="wrapper">
                        <article>
                            <div class="info-about-news">
                                <p>
                                    <a href="#"><time datetime="2019-11-18"><?php echo $news['date'] ?></time></a>
                                    АВТОР:
                                    <a href="#"><?php echo $news['author'] ?></a>
                                </p>
                            </div>
                            <h2><?php echo $news['title'] ?></h2>
                            <div class="news-content">
                                <?php echo $news['content'] ?>
                                <?php

                                if ($news['sourse'] != null) {
                                ?>
                                    <p>
                                        <a href="<?php echo $news['sourse'] ?>" class="sourse">источник</a>
                                    </p>
                                <?php
                                }
                                ?>
                            </div>
                            <h3>Добавить комментарий</h3>
                            <p>Ваш адрес email не будет опубликован. Обязательные поля помечены *</p>
                            <form class="comment-form" action="#" method="post">
                                <label for="comment">Комментарий</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                                <label for="author">Имя *</label>
                                <input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required">
                                <label for="email">Email *</label>
                                <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required">
                                <label for="url">Сайт</label>
                                <input id="url" name="url" type="url" value="" size="30" maxlength="200">
                                <button type="submit" class="btn">Отправить комментарий</button>
                            </form>
                            <div class="prev-or-next-news">
                                <?php if ($prev_news): ?>
                                    <a href="itemNews.php?id=<?php echo $prev_news['id'] ?>" class="prev-news">
                                        <span>НАЗАД</span>
                                        <p>X5 Retail Group вместе с PickPoint установит в супермаркетах 1,5 тысячи постаматов</p>
                                    </a>
                                <?php endif; ?>
                                <?php if ($next_news): ?>
                                    <a href="itemNews.php?id=<?php echo $next_news['id'] ?>" class="next-news">
                                        <span>ДАЛЕЕ</span>
                                        <p>Транспортная накладная (ТН или ТрН) 2021</p>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                        <?php
                        require_once '../includes/modules/footerAside.php';
                        ?>
                    </div>
                </div>
            </main>
            <?php
            require_once '../includes/modules/footer.php';
            ?>
            <script src="../js/animationNav.js"></script>

        </body>

        </html>
<?php
    }

    $stmt->close();
} else {
    echo "Некорректный ID новости.";
}
?>