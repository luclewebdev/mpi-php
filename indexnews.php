<?php

// se connecter à la DB


require_once "core/Models/News.php";


$modelNews = new News();

$news = $modelNews->findAll();

    // var_dump($messages);


//les afficher sur la page


require_once "core/templibs/toolsInAMess.php";

render("news/index",[
    "pageTitle" => 'Accueil',
    "news" => $news
])



?>






