<?php

require_once('db.php');

$query = "SELECT id, title, description, author, date FROM news ORDER BY date DESC";

$result = $connection->query($query);

if ($result->num_rows > 0) {
    while ($news = $result->fetch_assoc()) {
?>
        <div class="news-item">
            <div class="header-of-news">
                <a href="itemNews.php?id=<?php echo $news['id']; ?>">
                    <time datetime="16.15.2021"><?php echo $news['date']; ?></time>
                </a>
                <h3><a href="itemNews.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
            </div>
            <p><?php echo $news['description']; ?></p>
            <p><a href="itemNews.php?id=<?php echo $news['id']; ?>">Читать далее</a></p>
        </div>
    <?php
    }
} else {
    ?>
    <p>Новостей нет.</p>
<?php
}
?>