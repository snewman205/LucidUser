<?php

class Logging {

	private $loggingLevel;

	function Logging($loggingLevel = NULL) {
	
		$this->loggingLevel = ($loggingLevel) ? $loggingLevel : E_ALL;
		echo $this->loggingLevel;
		
	}
	
	function error($errString, $errType = NULL) {
	
		trigger_error($errString, ($errType) ? $errType : E_USER_ERROR);
		
	}
	
}

?>