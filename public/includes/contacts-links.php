<?php

require_once('db.php');

$query = "SELECT phone FROM contacts WHERE id = 1";

$result = $connection->query($query);

while ($item = $result->fetch_assoc()) {
    $forlink = preg_replace("/[^\d]/", '', $item['phone']);
?>

    <ul class="social-media-links">
        <li>
            <a href="https://t.me/+<?php echo $forlink; ?>">
                <img src="../images/telegram.svg" alt="telegram">
                <div><?php echo $item['phone']; ?></div>
            </a>
        </li>
        <li>
            <a href="https://wa.me/<?php echo $forlink; ?>">
                <img src="../images/whatsapp.svg" alt="whatsapp">
                <div><?php echo $item['phone']; ?></div>
            </a>
        </li>
    </ul>
<?php
}
?>