<?php
namespace MVC\Lib;

class Autoload
{
    public static function autoload($className) {
        $className = str_replace("MVC", "", $className);
        $className = strtolower($className);
        $className = APP_PATH . $className . ".php";
        if (file_exists($className)) {
            require($className);
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');