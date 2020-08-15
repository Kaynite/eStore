<?php

namespace MVC\Lib;

use MVC\Models\UsersGroupsPrivilegesModel;

class Authentication
{
    private static $_instance;
    private static $_session;

    private static $_defaultPrivileges = [
        "/index/default",
        "/auth/logout"
    ];

    private function __construct($session)
    {
        self::$_session = $session;
    }

    private function __clone()
    {
    }

    public static function getInstance($session)
    {
        if(self::$_instance == null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isLoggedIn() {
        return isset(self::$_session->user);
    }

    public function isAuth($controller, $action) {
        $url = "/{$controller}/{$action}";
        if(in_array($url, self::$_session->user->Privileges) || in_array($url, self::$_defaultPrivileges)) {
            return true;
        } else {
            return false;
        }
    }
}
