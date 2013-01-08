<?php

define("ROOT_PATH", dirname(__DIR__) . "/");
define("MODEL_PATH", ROOT_PATH . "models/");
define("LIB_PATH", ROOT_PATH . "libraries/");

require_once(MODEL_PATH . "logging.class.php");
require_once(MODEL_PATH . "localization.class.php");
require_once(MODEL_PATH . "theme.class.php");

$Logging = new Logging(E_USER_ERROR);

$Localization = new Localization();
$Localization->setLang("EN");

$Theme = new Theme();

?>