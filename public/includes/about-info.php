<?php

require_once('db.php');

$query = "SELECT content FROM about LIMIT 1";

$result = $connection->query($query);

while ($item = $result->fetch_assoc()) {
?>
    <div>
        <?php echo $item['content']; ?>
    </div>
<?php
}
?>