<?php

// se connecter à la DB


require_once "core/templibs/db.php";

$pdo = getPdo();


// récuperer les messages


    $requete = $pdo->query("SELECT * FROM messages");

    $messages = $requete->fetchAll();

    // var_dump($messages);


//les afficher sur la page


require_once "core/templibs/toolsInAMess.php";

render("message/index",[
    "pageTitle" => 'Accueil',
    "messages" => $messages
])



?>






