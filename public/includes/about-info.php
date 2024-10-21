<?php

require_once('db.php');

$query = "SELECT content FROM about";

$result = $connection->query($query);

while ($item = $result->fetch_assoc()) {
?>
    <div>
        <?php echo $item['content']; ?>
    </div>
<?php
}
?>