<?php
//recuperer l'id
require_once "core/templibs/db.php";
require_once "core/templibs/toolsInAMess.php";
$id = null;

 if(
     !empty($_GET['id'])
     &&
     ctype_digit($_GET['id'])

 ) {
     $id=$_GET['id'];
 }

 if(!$id){
     redirect("index.php");

 }

//se connecter à la db



$pdo = getPdo();


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

redirect("index.php");