<?php

define("ROOT_DIR", dirname(__DIR__) . "/");
define("MODEL_DIR", ROOT_DIR . "models/");
define("LIB_DIR", ROOT_DIR . "libraries/");
define("THEME_DIR", ROOT_DIR . "themes/");

define("DB_PREFIX", "lu_");
define("DB_HOST", "localhost");
define("DB_NAME", "luciduser");
define("DB_USER", "root");
define("DB_PASS", "");

require_once(MODEL_DIR . "logging.class.php");
require_once(MODEL_DIR . "localization.class.php");
require_once(LIB_DIR . "MeekroDB/meekrodb.class.php");
require_once(MODEL_DIR . "theme.class.php");

$Database = new MeekroDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$Logging = new Logging(E_USER_ERROR);

$Localization = new Localization();
$Localization->setLang("EN");

$currentTheme = $Database->queryOneField('configValue', "SELECT * FROM " . DB_PREFIX . "config WHERE configName=%s", 'theme');
$Theme = new Theme($currentTheme);

?>
