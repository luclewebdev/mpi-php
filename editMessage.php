<?php
$pdo = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8", "jeanluc", "Jeanluc*22",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


$id=$_GET['id'];

$requete = $pdo->prepare("SELECT * FROM messages WHERE id = :id");







$requete->execute([
    "id"=>$id
]);

$message = $requete->fetch();


if(!$message)
{
    header('Location: index.php');
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


ob_start();


require_once "templates/message/edit.html.php";


$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";