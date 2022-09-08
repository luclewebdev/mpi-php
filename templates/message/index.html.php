<a href ="createMessage.php">Nouveau message</a>

<?php
foreach ($messages as $message): ?>
    <hr>
    <p><?php  echo $message->getContent(); ?></p>
    <a href="?type=message&action=show&id=<?= $message->getId() ?>">Lire</a>
    <hr>

<?php endforeach;

