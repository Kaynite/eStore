<?php

namespace MVC\Lib;

class FrontController
{
    use Helper;

    const NOT_FOUND_CONTROLLER = "MVC\Controllers\NotFoundController";
    const NOT_FOUND_ACTION = "notFoundAction";
    const AUTH_CONTROLLER = "MVC\Controllers\AuthController";
    const LOGIN_ACTION = "loginAction";

    private $_controller = "index";
    private $_action = "default";
    private $_params = array();

    private $_template;
    private $_registry;
    private $_authentication;

    public function __construct(Template $template, Registry $registry, Authentication $_authentication)
    {
        $this->_template = $template;
        $this->_registry = $registry;
        $this->_authentication = $_authentication;
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode("/", trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/",), 3);
        if (isset($url[0]) && $url[0] != "") {
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != "") {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != "") {
            $this->_params = explode("/", $url[2]);
        }
    }
    public function dispatch()
    {
        if (!$this->_authentication->isLoggedIn() && $this->_controller != "auth" && $this->_action != "login") {
            $this->redirect("/auth/login");
        } elseif ($this->_authentication->isLoggedIn() && $this->_controller == "auth" && $this->_action == "login") {
            isset($_SERVER["HTTP_REFERER"]) ? $this->redirect($_SERVER["HTTP_REFERER"])  : $this->redirect("/");
        } elseif ($this->_authentication->isLoggedIn()) {
            if (!$this->_authentication->isAuth($this->_controller, $this->_action) && ALLOW_PRIVILEGES) {
                $this->_controller = "auth";
                $this->_action = "accessDenied";
            }
        }

        $controllerClassName = "MVC\Controllers\\" . ucfirst($this->_controller) . "Controller";
        $actionName = $this->_action . "Action";

        if (!class_exists($controllerClassName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if (!method_exists($controller, $actionName)) {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setRegistry($this->_registry);
        $controller->$actionName();
    }
}
