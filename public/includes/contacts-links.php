<?php

require_once('db.php');
require_once('authentication/functions.php');



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
        <div class="feedback">
            <button class="open_pop_up">Оставить заявку на обратную связь</button>
            <div class="pop_up">
                <div class="pop_up_container">
                    <div class="pop_up_body">
                        <h3>Заполните информацию и мы с Вами свяжемся</h3>
                        <form class="form-for-feedback" action="../includes/actions/createFeedback.php" method="post">
                            <div class="fields">
                                <div>
                                    <label for="name">Имя:</label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        maxlength="50">
                                </div>
                                <div>
                                    <label for="phone">Телефон:</label>
                                    <input
                                        type="text"
                                        id="phone"
                                        name="phone"
                                        placeholder="+7 (999) 999-99-99"
                                        maxlength="18">
                                </div>
                                <div>
                                    <label for="email">Почта:</label>
                                    <input
                                        type="text"
                                        id="email"
                                        name="email"
                                        maxlength="319">
                                </div>
                            </div>
                            <button type="submit">Отправить</button>
                        </form>
                        <?php clearErrors() ?>
                        <div class="pop_up_close">&#10006</div>
                    </div>
                </div>
            </div>
            <?php if (checkStatus()): ?>
                <output class="<?php showStatus('attr'); ?>"><?php showStatus('status'); ?></output>
            <?php endif; ?>
        </div>
    </div>
<?php
}
?>