<?php
!defined("DS") ? define("DS", DIRECTORY_SEPARATOR) : null;

define("APP_PATH", str_replace("config", "", realpath(dirname(__FILE__))));
define("CONFIG_PATH", realpath(dirname(__FILE__)));
define("LIB_PATH", APP_PATH . "lib");
define("VIEWS_PATH", APP_PATH . "views" . DS);
define("TEMPLATE_PATH", APP_PATH . "template" . DS);
define("LANGUAGE_PATH", APP_PATH . "languages" . DS);
define("IMAGES_PATH", realpath($_SERVER["DOCUMENT_ROOT"]) . DS . "images" . DS);

define("CSS", "/css/");
define("JS", "/js/");

/* Database Configurations */
defined("DATABASE_HOST") ? null : define("DATABASE_HOST", "localhost");
defined("DATABASE_NAME") ? null : define("DATABASE_NAME", "storedb");
defined("DATABASE_USERNAME") ? null : define("DATABASE_USERNAME", "root");
defined("DATABASE_PASSWORD") ? null : define("DATABASE_PASSWORD", "");
defined("DEFAULT_LANGUAGE") ? null : define("DEFAULT_LANGUAGE", "en");

defined("ALLOW_PRIVILEGES") ? null : define("ALLOW_PRIVILEGES", false);


defined("PASSWORD_SALT") ? null : define("PASSWORD_SALT", "Kaynite");
