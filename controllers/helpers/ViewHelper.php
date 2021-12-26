<?php

class ViewHelper
{
    private $variables = [];

    public function __set($name, $value)
    {
        $this->variables[$name] = $value;    
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->variables)){
            return $this->variables[$name];
        }

        return null;
    }
}