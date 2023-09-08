<?php

namespace App\Services;

class DispatchRoute
{
    private $controller;
    private $params;

    public function __construct($controller, $params = [])
    {
        $this->controller = $controller;
        $this->params = $params;
    }

    public function getControllers()
    {
        return $this->controller;
    }

    public function getParams()
    {
        return $this->params;
    }
}