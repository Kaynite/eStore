<?php

namespace MVC\Lib;

class Template
{
    private $_templateParts;
    private $_actionView;
    private $_data;
    private $_dictionary;
    private $_tempDictionary;
    private $_tempMessages;
    private $_registry;

    private $_currentController;
    private $_currentAction;

    public function __construct()
    {
        $this->_templateParts = require_once ".." . DS . "app" . DS . "config" . DS . "templateconfig.php";
    }

    public function __get($key)
    {
        return $this->_registry->$key;
    }

    public function getMsg($key)
    {
        return $this->_tempMessages[$key];
    }

    public function cleanTemplate()
    {
        $this->_templateParts["template"] = [
            "Header"        => TEMPLATE_PATH . "header.php",
            ":view"         => ":action_view",
            "EndTemplate"   => TEMPLATE_PATH . "endtemplate.php"
        ];
    }

    public function setActionView($view)
    {
        $this->_actionView = $view;
    }

    public function setAppData($data)
    {
        $this->_data = $data;
    }

    public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }

    public function setDictionary($dictionary)
    {
        $this->_dictionary = $dictionary;
    }

    public function setTempDictionary($tempDictionary)
    {
        $this->_tempDictionary = $tempDictionary;
    }

    public function setTempMessages($tempMessages)
    {
        $this->_tempMessages = $tempMessages;
    }

    public function setCurrentData($controller, $action)
    {
        $this->_currentController   = $controller;
        $this->_currentAction       = $action;
    }

    public function setActiveClass($data) {
        return in_array($this->_currentController, $data) ? "active" : Null;
    }

    public function setMenuOpen($data) {
        return in_array($this->_currentController, $data) ? "menu-open" : Null;
    }

    public function separateHeaderResources()
    {
        $headerCSS = $this->_templateParts["header_resources"]["css"];
        $headerJS = $this->_templateParts["header_resources"]["js"];
        $cssOutput = "";
        $jsOutput = "";
        if (!empty($headerCSS)) {
            foreach ($headerCSS[DEFAULT_LANGUAGE] as $cssFile) {
                $cssOutput .= '<link rel="stylesheet" href="' . $cssFile . '">';
            }
        }
        if (!empty($headerJS)) {
            foreach ($headerJS as $jsFile) {
                $jsOutput .= '<script src="' . $jsFile . '"></script>';
            }
        }
        $this->_data["headerCssFiles"] = $cssOutput;
        $this->_data["headerJsFiles"] = $jsOutput;
    }

    public function separateFooterResources()
    {
        $footerJS = $this->_templateParts["footer_resources"]["js"];
        $jsOutput = "";
        if (!empty($footerJS)) {
            foreach ($footerJS as $jsFile) {
                $jsOutput .= '<script src="' . $jsFile . '"></script>';
            }
        }
        $this->_data["footerJsFiles"] = $jsOutput;
    }

    public function renderApp()
    {
        $this->separateHeaderResources();
        $this->separateFooterResources();
        !empty($this->_data) ? extract($this->_data) : null;
        !empty($this->_tempDictionary) ? extract($this->_tempDictionary) : null;
        !empty($this->_dictionary) ? extract($this->_dictionary) : null;
        $parts = $this->_templateParts["template"];
        foreach ($parts as $partKey => $partPath) {
            if (!empty($parts)) {
                if ($partKey !== ":view") {
                    require $partPath;
                } else {
                    require $this->_actionView;
                }
            }
        }
    }
}
