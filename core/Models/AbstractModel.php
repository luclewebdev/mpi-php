<?php


namespace Models;

require_once "core/templibs/db.php";




abstract class AbstractModel
{


    protected $pdo;

    protected $tableName;



    public function __construct()
    {

        $this->pdo = getPdo();

    }

    public function findAll(){





        $requete = $this->pdo->query("SELECT * FROM {$this->tableName}");

        $elements = $requete->fetchAll();


        return $elements;

    }

    public function find($id){



        $requete = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");



        $requete->execute([
            "id"=>$id
        ]);

        $element = $requete->fetch();

        return $element;
    }

    public function delete($id){




        $requeteSuppr = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = :id");

        $requeteSuppr->execute(["id"=>$id]);
    }


}