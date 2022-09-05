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




    ob_start();


require_once "templates/message/message.html.php";


$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";

?>