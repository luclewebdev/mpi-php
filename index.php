<?php

// se connecter à la DB


require_once "core/Models/Message.php";


$modelMessage = new Message();

$messages = $modelMessage->findAll();

    // var_dump($messages);


//les afficher sur la page


require_once "core/templibs/toolsInAMess.php";

render("message/index",[
    "pageTitle" => 'Accueil',
    "messages" => $messages
])



?>






