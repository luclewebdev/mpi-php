<?php

namespace Controllers;


require_once "core/Models/Message.php";
require_once "core/Controllers/AbstractController.php";
require_once "core/templibs/toolsInAMess.php";



class Message extends AbstractController
{


    protected $defaultModelName = \Models\Message::class;


    public function index(){


        $messages = $this->defaultModel->findAll();

        render("message/index",[
            "pageTitle" => 'Accueil',
            "messages" => $messages
        ]);
    }


    public function show()
    {

        $id=$_GET['id'];

        $message = $this->defaultModel->find($id);


        render("message/show",[
            "pageTitle" => "message n°{$message['id']}",
            "message" => $message
        ]);

    }

    // remove


    // new

    
    //change

}