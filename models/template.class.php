<?php

require_once(LIB_DIR . "XTPL/xtemplate.class.php");

class Template extends Theme {

	private $xtpl;

	function Template($tpl = NULL) {
		
		if($tpl) {
		
			$this->xtpl = (!$this->xtpl) ? new XTemplate($tpl) : $this->xtpl->restart($tpl);
			
		}
		
	}
	
	function setTemplate($tpl = NULL) {
	
		global $Logging;
	
		if($tpl === NULL) {
		
			$Logging->error("Must specify template file", E_USER_ERROR);
			
		}
		
		$this->xtpl = (!$this->xtpl) ? new XTemplate($tpl) : $this->xtpl->restart($tpl);
		
	}
	
}