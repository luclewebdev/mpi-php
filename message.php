<?php

require_once "core/templibs/db.php";
require_once "core/templibs/toolsInAMess.php";
$pdo = getPdo();

$id=$_GET['id'];

$requete = $pdo->prepare("SELECT * FROM messages WHERE id = :id");







$requete->execute([
    "id"=>$id
]);

    $message = $requete->fetch();






render("message/show",[
    "pageTitle" => "message n°{$message['id']}",
    "message" => $message
]);