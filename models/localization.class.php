<?php

class Localization {

	private $lang;

	function setLang($lang = NULL) {
	
		$this->lang = ($lang) ? $lang : "EN";
		
	}
	
}

?>