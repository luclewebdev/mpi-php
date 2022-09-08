<?php

require_once "core/templibs/toolsInAMess.php";
require_once "core/Models/Message.php";


$messageContent = null;

if(!empty($_POST['content'])){


    $messageContent = htmlspecialchars($_POST['content']) ;
}

if($messageContent){

    $modelMessage = new Message();

    $idMessage = $modelMessage->save($messageContent);

    redirect('message.php?id='.$idMessage);

}






render("message/create",[
    "pageTitle" => 'Nouveau message'
]);