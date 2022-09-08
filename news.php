<?php

require_once "core/templibs/toolsInAMess.php";
require_once "core/Models/News.php";


$id=$_GET['id'];

$modelNews = new News();

$news = $modelNews->find($id);



render("news/show",[
    "pageTitle" => "message n°{$news['id']}",
    "news" => $news
]);