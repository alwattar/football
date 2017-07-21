<?php

define('DEFAULT_LANG','en');
define("URL","/football"); // the base url If the Base is '/' set the value empty define("URL","");

define("ADMIN_R", '/admin');
define("ADMIN_PATH", URL . ADMIN_R);
define("PUBLIC_PATH", URL . "/public");
define("IMG_PATH", PUBLIC_PATH . "/img");
define("CSS_PATH", PUBLIC_PATH . "/css");
define("JS_PATH", PUBLIC_PATH . "/js");
define("CK_E_PATH", PUBLIC_PATH . "/ckeditor");
define("CK_F_PATH", PUBLIC_PATH . "/ckfinder");

define("REGEX_INT",'/^[0-9]+$/');
define("REGEX_USERNAME",'/^[a-z][a-z0-9._]{3,19}$/');
define("REGEX_SPECIAL_CHAR",'/[\'"<>\\\]/'); // block this characters
define("REGEX_EMAIL",'/^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]+$/');
define("SECRET_CAPTCHA","");
define("ALL_LANG",'ar,en');
?>
