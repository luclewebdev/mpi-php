<?php
//recuperer l'id

$id = null;

 if(
     !empty($_GET['id'])
     &&
     ctype_digit($_GET['id'])

 ) {
     $id=$_GET['id'];
 }

 if(!$id){
     header("Location: index.php");

 }

//se connecter à la db

$pdo = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8", "jeanluc", "Jeanluc*22",[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


//verifier qu'il existe bien

$requete = $pdo->prepare("SELECT * FROM messages WHERE id = :id");


$requete->execute(["id"=>$id]);

$message = $requete->fetch();

//si il existe bien, alors executer une requete de suppression
if($message){

    $requeteSuppr = $pdo->prepare("DELETE FROM messages WHERE id = :id");

    $requeteSuppr->execute(["id"=>$id]);

}

//dans tous les cas, rediriger vers l'accueil (index.php)

header("Location: index.php");