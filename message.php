<?php

require_once "core/templibs/toolsInAMess.php";
require_once "core/Models/Message.php";


$id=$_GET['id'];

$modelMessage = new Message();

$message = $modelMessage->find($id);



render("message/show",[
    "pageTitle" => "message n°{$message['id']}",
    "message" => $message
]);