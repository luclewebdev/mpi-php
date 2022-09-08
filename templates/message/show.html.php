

<h3> <?= $message->getContent(); ?> </h3>
<a href="editMessage.php?id=<?= $message->getId() ?>">Editer</a>
<a href="deleteMessage.php?id=<?= $message->getId() ?>">Supprimer</a>
<a href="index.php">Retour</a>