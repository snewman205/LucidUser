<?php

require_once(LIB_DIR . "XTPL/xtemplate.class.php");

class Template extends Theme {

	private $xtpl;

	function Template($tpl = NULL) {
		
		global $Logging;
		
		if($tpl) {
		
			if(!file_exists($this->themePath . $tpl)) {
			
				$Logging->error("Failed to open specified template file", E_USER_ERROR);
				
			}
		
			$this->xtpl = (!$this->xtpl) ? new XTemplate($tpl) : $this->xtpl->restart($tpl);
			
		}
		
	}
	
	function setTemplate($tpl = NULL) {
	
		global $Logging;
	
		if($tpl === NULL) {
		
			$Logging->error("Must specify template file", E_USER_ERROR);
			
		}
		
		if(!file_exists($this->themePath . $tpl)) {
			
			$Logging->error("Failed to open specified template file", E_USER_ERROR);
				
		}
		
		$this->xtpl = (!$this->xtpl) ? new XTemplate($tpl) : $this->xtpl->restart($tpl);
		
	}
	
}