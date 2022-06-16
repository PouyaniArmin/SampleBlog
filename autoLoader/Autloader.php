<?php

class AutoLoader
{
    public function __construct()
    {
        spl_autoload_register(array($this, $this->load('load')));
    }
    public function load($class)
    {
        $path = __DIR__ . "$class.php";
        $path = str_replace("\\", "/", $path);
        $path = str_replace('/autoLoader', '', $path);
        require_once $path;
    }
}
new AutoLoader();
