<?php

define("ROOT_DIR", dirname(__DIR__) . "/");
define("MODEL_DIR", ROOT_DIR . "models/");
define("LIB_DIR", ROOT_DIR . "libraries/");

define("DB_HOST", "localhost");
define("DB_NAME", "luciduser");
define("DB_USER", "root");
define("DB_PASS", "");

require_once(MODEL_DIR . "logging.class.php");
require_once(MODEL_DIR . "localization.class.php");
require_once(LIB_DIR . "dbFacile/dbFacile_mysqli.php");
require_once(MODEL_DIR . "theme.class.php");

$Database = new dbFacile_mysqli(DB_NAME, DB_USER, DB_PASS, DB_HOST);

$Logging = new Logging(E_USER_ERROR);

$Localization = new Localization();
$Localization->setLang("EN");

$Theme = new Theme();

?>