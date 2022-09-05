<form action="editMessage.php?id=<?=$message['id']?>" method="post">
    <input type="text" name="content" value="<?= $message['content'] ?>">
    <input type="submit" value="Submit">
</form>