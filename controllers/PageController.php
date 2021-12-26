<?php

abstract class PageController
{
    protected $vh;
    protected $parameters;

    public function __construct()
    {
        $this->vh = new ViewHelper();
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    protected function isSubmited(): bool
    {
        return isset($this->parameters['submit']);
    }

    protected function renderPage(string $page_name)
    {
        $vh = $this->vh;
        require_once 'views/' . $page_name;
        die;
    }

    protected function redirect(string $url, bool $is_local = true)
    {
        $config = Config::getInstance();

        $location = $is_local ? ($config->get('app')['root_url']. $url) : $url;
        header('Location: ' . $location);
        die;
    }

    abstract public function process();
}