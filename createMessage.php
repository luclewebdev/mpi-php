<?php

require_once "core/templibs/toolsInAMess.php";


$messageContent = null;

if(!empty($_POST['content'])){


    $messageContent = htmlspecialchars($_POST['content']) ;
}

if($messageContent){

    require_once "core/templibs/db.php";

    $pdo = getPdo();


    $requete = $pdo->prepare("INSERT INTO messages (content) VALUES (:content)");

    $requete->execute([
        "content"=> $messageContent
    ]);
    $idMessage = $pdo->lastInsertId();

    redirect('message.php?id='.$idMessage);

}






render("message/create",[
    "pageTitle" => 'Nouveau message'
]);