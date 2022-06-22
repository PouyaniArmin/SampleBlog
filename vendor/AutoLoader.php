<?php

namespace vendor;

class AutoLoader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'load'));
    }    
    /**
     * load
     *
     * @param  mixed $class
     * @return void
     */
    public function load($class)
    {
        $path=__DIR__."/$class.php";
        $path=str_replace("\\","/",$path);
        $path=str_replace('/vendor','',$path);
        require_once($path);
    }
}
new AutoLoader();
