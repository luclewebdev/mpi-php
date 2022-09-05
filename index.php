<?php

// se connecter à la DB


    $pdo = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8", "jeanluc", "Jeanluc*22",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);



  //  var_dump($pdo);

// récuperer les messages


    $requete = $pdo->query("SELECT * FROM messages");

    $messages = $requete->fetchAll();

    // var_dump($messages);


//les afficher sur la page




ob_start();

    require_once "templates/message/index.html.php";


$contenuDeLaPage = ob_get_clean();

require_once "templates/layout.html.php";


?>






