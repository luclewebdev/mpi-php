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


if(!$message)
{
    redirect('index.php');
}



$messageContent = null;

if(!empty($_POST['content'])){


    $messageContent = htmlspecialchars($_POST['content']) ;
}

if($messageContent){




    $requete = $pdo->prepare("UPDATE messages SET content = :content WHERE id = :message_id");

    $requete->execute([
        "content"=> $messageContent,
        "message_id" => $message['id']
    ]);


    header('Location: message.php?id='.$message['id']);
    exit();

}





render("message/edit",[
    "pageTitle" => "Editer le message n°{$message['id']}",
    "message" => $message
]);