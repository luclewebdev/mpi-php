<?php

namespace Controllers;

class AbstractController
{

    protected $defaultModel;

    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }




}