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

        return $this->render("message/index",[
            "pageTitle" => 'Accueil',
            "messages" => $messages
        ]);
    }


    public function show()
    {

        $id=$_GET['id'];

        $message = $this->defaultModel->find($id);


        return $this->render("message/show",[
            "pageTitle" => "message n°{$message['id']}",
            "message" => $message
        ]);

    }

    public function remove()
{
                $id = null;

                if(
                    !empty($_GET['id'])
                    &&
                    ctype_digit($_GET['id'])

                ) {
                    $id=$_GET['id'];
                }

                if(!$id){
                    return $this->redirect("index.php");

                }




    $message = $this->defaultModel->find($id);

    if($message){
        $this->defaultModel->delete($id);

    }



   return $this->redirect("index.php");


}


    public function new()
    {
        $messageContent = null;

        if(!empty($_POST['content'])){


            $messageContent = htmlspecialchars($_POST['content']) ;
        }

        if($messageContent){


            $idMessage = $this->defaultModel->save($messageContent);

            return $this->redirect('message.php?id='.$idMessage);

        }






        return $this->render("message/create",[
            "pageTitle" => 'Nouveau message'
        ]);


    }

    public function change()
    {

        $id=$_GET['id'];




        $message = $this->defaultModel->find($id);


        if(!$message)
        {
            redirect('index.php');
        }

        $messageContent = null;

        if(!empty($_POST['content'])){


            $messageContent = htmlspecialchars($_POST['content']) ;
        }

        if($messageContent){




            $this->defaultModel->edit($messageContent, $message['id']);


            redirect('message.php?id='.$message['id']);


        }





        return $this->render("message/edit",[
            "pageTitle" => "Editer le message n°{$message['id']}",
            "message" => $message
        ]);

    }

}
