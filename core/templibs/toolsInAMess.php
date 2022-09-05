<?php


function render(string $nomDeTemplate, array $donneesDeLaPage)
{



    ob_start();

    extract($donneesDeLaPage);

    require_once "templates/{$nomDeTemplate}.html.php";


    $contenuDeLaPage = ob_get_clean();

    ob_start();

    require_once "templates/layout.html.php";


    echo ob_get_clean();
}

function redirect(string $url):void
{
    header("Location: {$url}");
    exit();
}
