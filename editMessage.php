<?php


require_once "core/templibs/toolsInAMess.php";
require_once "core/Models/Message.php";



$id=$_GET['id'];


$modelMessage = new Message();


$message = $modelMessage->find($id);


if(!$message)
{
    redirect('index.php');
}

$messageContent = null;

if(!empty($_POST['content'])){


    $messageContent = htmlspecialchars($_POST['content']) ;
}

if($messageContent){




$modelMessage->edit($messageContent, $message['id']);


   redirect('message.php?id='.$message['id']);


}





render("message/edit",[
    "pageTitle" => "Editer le message n°{$message['id']}",
    "message" => $message
]);