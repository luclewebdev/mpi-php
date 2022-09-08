<?php


namespace Models;



require_once "core/Models/AbstractModel.php";


class Message extends AbstractModel
{

 protected $tableName = "messages";





public function save($messageContent)
{



    $requete = $this->pdo->prepare("INSERT INTO {$this->tableName} (content) VALUES (:content)");

    $requete->execute([
        "content"=> $messageContent
    ]);
    $idMessage = $this->pdo->lastInsertId();

    return $idMessage;
}

public function edit($messageContent, $id ){




    $requete = $this->pdo->prepare("UPDATE {$this->tableName} SET content = :content WHERE id = :message_id");

    $requete->execute([
        "content"=> $messageContent,
        "message_id" => $id
    ]);
}








}