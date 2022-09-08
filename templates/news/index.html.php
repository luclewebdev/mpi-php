<a href ="createMessage.php">Nouveau message</a>

<?php
foreach ($news as $oneNews): ?>
    <hr>
    <p><?php  echo $oneNews['info']; ?></p>
    <a href="news.php?id=<?= $oneNews['id'] ?>">Lire</a>
    <hr>

<?php endforeach;

