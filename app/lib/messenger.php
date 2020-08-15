<?php

namespace MVC\Lib;

class Messenger
{
    const MESSAGE_TYPE_SUCCESS  = "success";
    const MESSAGE_TYPE_DANGER   = "danger";
    const MESSAGE_TYPE_WARNING  = "warning";
    const MESSAGE_TYPE_INFO     = "info";

    private static $_instance;
    private $_session;
    private $_messages;


    public function __construct($session)
    {
        $this->_session = $session;
    }
    public function __clone()
    {
    }

    public static function getInstance($session)
    {
        if (self::$_instance == null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }


    public function add($message, $type = self::MESSAGE_TYPE_SUCCESS)
    {
        if (!isset($this->_session->messages)) {
            $this->_session->messages = [];
        }
        $msgs = $this->_session->messages;
        $msgs[] = ["content" => $message, "type" => $type];
        $this->_session->messages = $msgs;
    }

    public function getMessages()
    {
        if (isset($this->_session->messages)) {
            $this->_messages = $this->_session->messages;
            unset($this->_session->messages);
            return $this->_messages;
        } else {
            return [];
        }
    }
}
