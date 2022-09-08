<?php

namespace Controllers;

require_once "core/App/Response.php";
require_once "core/App/View.php";


class AbstractController
{

    protected $defaultModel;

    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }

    public function redirect(string $url)
    {
        return \App\Response::redirect($url);
    }

    public function render(string $nomDeTemplate, array $donneesDeLaPage)
    {
        return \App\View::render($nomDeTemplate, $donneesDeLaPage);

    }




}