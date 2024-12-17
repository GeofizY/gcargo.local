<?php

require_once('db.php');

$query = "SELECT phone FROM contacts WHERE id = 1";

$result = $connection->query($query);

while ($item = $result->fetch_assoc()) {
    $forlink = preg_replace("/[^\d]/", '', $item['phone']);
?>

    <div class="contacts">
        <div class="phone">
            <h3>Телефон</h3>
            <a href="tel:<?php echo $forlink; ?>"><?php echo $item['phone']; ?></a>
        </div>
        <div class="social-media">
            <h3>Мы в соцсетях</h3>
            <ul class="social-media-links">
                <li>
                    <a href="https://t.me/+<?php echo $forlink; ?>">
                        <img src="../images/telegram.svg" alt="telegram">
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo $forlink; ?>">
                        <img src="../images/whatsapp.svg" alt="whatsapp">
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php
}
?>