<?php
namespace MVC\Lib;

trait Helper {
    public function redirect($into) {
        session_write_close();
        header("Location: {$into}");
    }
}