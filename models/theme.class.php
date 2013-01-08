<?php

class Theme {

	private $themeId;
	
	protected $themePath;
	
	public $themeName;
	
	function Theme($themeId = NULL) {
	
		global $Database, $Logging, $Localization;
	
		if($themeId === NULL) {
		
			$Logging->error("Must specify theme ID", E_USER_ERROR);
			//$Logging->error($Localization->stringFromKey(ERR_MISSING_THEMEID), E_USER_ERROR);
			
		}
		
		$themeCfg = $Database->queryFirstRow("SELECT * FROM " . DB_PREFIX . "themes WHERE themeId=%s", $themeId);
		
		$this->themeId = $themeCfg['themeId'];
		$this->themePath = THEME_DIR . $themeCfg['themeSystemName'] . "/";
		$this->themeName = $themeCfg['themeDisplayName'];
		
	}
	
}

?>