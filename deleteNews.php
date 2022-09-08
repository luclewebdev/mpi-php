<?php

require_once "core/templibs/toolsInAMess.php";

require_once "core/Models/News.php";


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
     redirect("index.php");

 }

//verifier qu'il existe bien

$modelMessage = new News();

$message = $modelMessage->find($id);

//si il existe bien, alors executer une requete de suppression
if($message){

    $modelMessage->delete($id);

}

//dans tous les cas, rediriger vers l'accueil (index.php)

redirect("indexnews.php");