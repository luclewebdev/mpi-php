<a href ="createMessage.php">Nouveau message</a>

<?php
foreach ($messages as $message): ?>
    <hr>
    <p><?php  echo $message['content']; ?></p>
    <a href="message.php?id=<?= $message['id'] ?>">Lire</a>
    <hr>

<?php endforeach;

