<?php

define("ROOT_DIR", dirname(__DIR__) . "/");
define("MODEL_DIR", ROOT_DIR . "models/");
define("LIB_DIR", ROOT_DIR . "libraries/");

require_once(LIB_DIR . "DABL/config.php");
require_once(MODEL_DIR . "logging.class.php");
require_once(MODEL_DIR . "localization.class.php");
require_once(MODEL_DIR . "theme.class.php");

$Logging = new Logging(E_USER_ERROR);

$Localization = new Localization();
$Localization->setLang("EN");

$Theme = new Theme();

?>