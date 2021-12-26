<?php

class HttpRequest
{
    private static $instance = null;

    private $controller;
    private $parameters;
    private $method;

    private function __construct()
    {
        $this->init();
    }

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function init()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? null;
        
        $this->controller = $_GET['controller'];

        $this->parameters = $_REQUEST;
        unset($this->parameters['controller']);

        if(isset($_FILES)){
            $this->parameters['files'] = $_FILES;
        }
    }

    public function getParameter(string $key) : string
    {
        if (isset($this->parameters[$key])) {
            return $this->parameters[$key]; 
        }
        return null;
    }

    public function getParameters() : array
    {
        return $this->parameters;
    }

    public function getMethod() : string
    {
        return $this->method;
    }

    public function getController() : string
    {
        return $this->controller;
    }
}