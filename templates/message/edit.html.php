<form action="editMessage.php?id=<?=$message->getId()?>" method="post">
    <input type="text" name="content" value="<?= $message->getContent() ?>">
    <input type="submit" value="Submit">
</form>