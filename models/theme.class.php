<?php

require_once(LIB_DIR . "XTPL/xtemplate.class.php");

class Theme {

	private $themeId;
	
	protected $themePath;
	
	public $themeName;
	
	function Theme($themeId = NULL) {
	
		global $Logging, $Localization;
	
		echo $themeId;
	
		if($themeId === NULL) {
		
			$Logging->error("Must specify theme ID", E_USER_ERROR);
			//$Logging->error($Localization->stringFromKey(ERR_MISSING_THEMEID), E_USER_ERROR);
			
		}
		
	}
	
}

?>