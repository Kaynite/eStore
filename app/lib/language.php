<?php

namespace MVC\Lib;

class Language
{
    public function load($controllerName, $actionName)
    {
        if (file_exists(LANGUAGE_PATH . DEFAULT_LANGUAGE . DS . $controllerName . DS . $actionName . ".lang.php")) {
            $file = require LANGUAGE_PATH . DEFAULT_LANGUAGE . DS . $controllerName . DS . $actionName . ".lang.php";
            return $file;
        } else {
            die ("There is No Dictionary For this View");
        }
    }
}
