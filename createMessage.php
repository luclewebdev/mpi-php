<?php




$messageContent = null;

if(!empty($_POST['content'])){


    $messageContent = htmlspecialchars($_POST['content']) ;
}

if($messageContent){


    $pdo = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8", "jeanluc", "Jeanluc*22",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);



    $requete = $pdo->prepare("INSERT INTO messages (content) VALUES (:content)");

    $requete->execute([
        "content"=> $messageContent
    ]);
    $idMessage = $pdo->lastInsertId();

    header('Location: message.php?id='.$idMessage);
    exit();

}





ob_start();


require_once "templates/message/create.html.php";


$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";