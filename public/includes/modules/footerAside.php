<?php

require_once(__DIR__ . '/../db.php');

$query = "SELECT address, phone FROM contacts";

$result = $connection->query($query);

while ($news = $result->fetch_assoc()) {
?>
    <footer class="footer-aside">
        <section class="find-us">
            <h4>НАЙДИТЕ НАС</h4>
            <div>
                <strong>Адрес</strong>
                <p><?php echo $news['address']; ?></p>
            </div>
            <div>
                <strong>Телефон</strong>
                <p><?php echo $news['phone']; ?></p>
            </div>
            <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad4230969f46a45df5483611ba290c9231b938daf4ce24f29471fe9800491d071&amp;width=300&amp;height=150&amp;lang=ru_RU&amp;scroll=true"></script>
        </section>
        <div class="search-and-site">
            <section class="search">
                <h4>ПОИСК</h4>
                <form action="#" method="get">
                    <label for="search-form"></label>
                    <input type="search" id="search-form" name="s" placeholder="Поиск…">
                    <button type="submit">
                        <img src="../images/search.svg" alt="search">
                    </button>
                </form>
            </section>
            <section class="about-site">
                <h4>О САЙТЕ</h4>
                <p>
                    Здесь может быть отличное место для того, чтобы представить себя, свой сайт или выразить какие-то благодарности.
                </p>
            </section>
        </div>

    </footer>
<?php
}
?>