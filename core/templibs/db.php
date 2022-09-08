<?php

/**
 * @return PDO
 *
 * ici je peux taper de la docu humaine
 *
 */
function getPdo() :PDO
{
    $pdo = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8", "jeanluc", "Jeanluc*22",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);


    return $pdo;

}

