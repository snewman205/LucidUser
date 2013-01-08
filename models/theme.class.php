<?php

class Theme {

	protected $themeId;
	
	public $themeName;
	public $themePath;
	
	function Theme($themeId = NULL) {
	
		global $Logging, $Localization;
	
		if(!$themeId) {
		
			$Logging->error("Must specify theme ID", E_USER_ERROR);
			//$Logging->error($Localization->stringFromKey(ERR_MISSING_THEMEID), E_USER_ERROR);
			
		}
		
	}
	
}

?>