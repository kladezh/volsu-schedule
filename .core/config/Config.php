<?php

class Config 
{
    private $configs_dir = 'files';
    private $config_file_type = 'json';
    private $reader;

    private static $instance = null;

    private function __construct()
    {
        $coder = ucfirst($this->config_file_type) . 'FileCoder';
        $handler = new FileHandler(new $coder);

        $this->reader = $handler;
    }

    public static function getInstance() : self
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function get(string $name) : array|false
    {
        $filename = $this->configs_dir . '/' . $name . '.' . $this->config_file_type;
        if(($content = $this->reader->read($filename)) === false){
            return false;
        }

        return $this->reader->decode($content);
    }
}