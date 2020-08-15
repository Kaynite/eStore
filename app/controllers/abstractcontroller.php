<?php

namespace MVC\Controllers;

use MVC\Lib\FrontController;
use MVC\Lib\Template;
use MVC\Lib\Registry;
use MVC\Lib\Validate;

class AbstractController
{
    use Validate;

    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];
    protected $_template;
    protected $_registry;

    public function __get($key)
    {
        return $this->_registry->$key;
    }
    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function setTemplate(Template $template)
    {
        $this->_template = $template;
    }

    public function setRegistry(Registry $regisrty)
    {
        $this->_registry = $regisrty;
    }

    protected function _view()
    {
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . ".view.php";
        if ($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)) {
            $view =  VIEWS_PATH . "notfound" . DS . "notfound.view.php";
            $this->_template->setActionView($view);
            $this->_template->setRegistry($this->_registry);
            $this->_template->setDictionary($this->language->load("notfound", "notFound"));
            $this->_template->setTempDictionary($this->language->load("template", "template"));
            $this->_template->renderApp();
        } else {
            $this->_template->setAppData($this->_data);
            $this->_template->setActionView($view);
            $this->_template->setRegistry($this->_registry);
            $this->_template->setDictionary($this->language->load($this->_controller, $this->_action));
            $this->_template->setTempDictionary($this->language->load("template", "template"));
            $this->_template->setTempMessages($this->language->load($this->_controller, "messages"));
            $this->_template->setCurrentData($this->_controller, $this->_action);
            $this->_template->renderApp();
        }
    }
}
