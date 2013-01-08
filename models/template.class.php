<?php

require_once(LIB_DIR . "XTPL/xtemplate.class.php");

class Template extends Theme {
	
	private $xtpl;

	function Template($tpl = NULL) {
		
		global $Logging, $Theme;
		
		if($tpl) {
		
			$tplPath = $Theme->getPath() . "views/" . $tpl;
		
			if(!file_exists($tplPath)) {
			
				$Logging->error("Failed to open specified template file", E_USER_ERROR);
				
			}
		
			$this->xtpl = (!$this->xtpl) ? new XTemplate($tplPath) : $this->xtpl->restart($tplPath);
			
		}
		
	}
	
	function setTemplate($tpl = NULL) {
	
		global $Logging, $Theme;
	
		if($tpl === NULL) {
		
			$Logging->error("Must specify template file", E_USER_ERROR);
			
		}
		
		$tplPath = $Theme->getPath() . "views/" . $tpl;
		
		if(!file_exists($tplPath)) {
			
			echo $Theme->getPath() . "views/" . $tpl;
			$Logging->error("Failed to open specified template file", E_USER_ERROR);
				
		}
		
		$this->xtpl = (!$this->xtpl) ? new XTemplate($tplPath) : $this->xtpl->restart($tplPath);
		
	}
	
}