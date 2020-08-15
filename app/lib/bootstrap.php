<?php
namespace MVC\Lib;

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
require_once ".." . DS . "app" . DS . "config" . DS . "config.php";
require_once LIB_PATH . DS . "Autoload.php";

$session = new SessionManager();
$session->start();
if(!isset($session->lang)) {
    $session->lang = DEFAULT_LANGUAGE;
}

$template = new Template();
$language = new Language();
$messenger = Messenger::getInstance($session);
$authentication = Authentication::getInstance($session);

$registry = Registry::getInstance();
$registry->session = $session;
$registry->language = $language;
$registry->messenger = $messenger;

$frontController = new FrontController($template, $registry, $authentication);
$frontController->dispatch();
