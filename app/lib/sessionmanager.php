<?php
namespace MVC\Lib;

use SessionHandler;

class SessionManager extends SessionHandler {

    private $sessionName = "APPSESS";
    private $sessionMaxLifetime = 0;
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;
    private $sessionPath = "/";
    private $sessionDomain;
    private $sessionSavePath = APP_PATH . "sessions";
    private $sessionCipherAlgo = "AES-128-ECB";
    private $sessionCipherKey = "KAYN1TEC1PH3R000";
    private $sessionDuration = "1"; // In Minutes

    public function __construct()
    {
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies", 1);
        ini_set("session.use_trans_sid", 0);
        ini_set("session.save_handler", "files");
        session_name($this->sessionName);
        session_save_path($this->sessionSavePath);
        session_set_cookie_params(
            $this->sessionMaxLifetime,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
    }

    public function __get($name)
    {
        return $_SESSION[$name] !== false ? $_SESSION[$name] : false;
    }

    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }


    public function __unset($key)
    {
        unset($_SESSION[$key]);
    }
    public function read($key) {
        return openssl_decrypt(parent::read($key), $this->sessionCipherAlgo, $this->sessionCipherKey);
    }

    public function write($id, $data) {
        return parent::write($id, openssl_encrypt($data, $this->sessionCipherAlgo, $this->sessionCipherKey));
    }

    public function start() {
        if (session_id() == "") {
            if(session_start()) {
                $this->setSessionStartTime();
                $this->checkSessionValidity();
            }
        }
    }

    private function checkSessionValidity() {
        if(time() - $this->sessionStartTime > ($this->sessionDuration * 60)) {
            $this->renewSession();
        }
    }

    private function setSessionStartTime() {
        if (!isset($this->sessionStartTime)) {
            $this->sessionStartTime = time();
        }
    }

    private function renewSession() {
        $this->sessionStartTime = time();
        session_regenerate_id(true);
    }
}