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
	
	function restart($options, $tpldir = '', $files = null, $mainblock = 'main', $autosetup = true, $tag_start = '{', $tag_end = '}') {
	
		$this->xtpl->restart($options, $tpldir, $files, $mainblock, $autosetup, $tag_start, $tag_end);
		
	}
	
	function setup($add_outer = false) {
	
		$this->xtpl->setup($add_outer);
		
	}
	
	function assign($name, $val = '', $reset_array = true) {
	
		$this->xtpl->assign($name, $val, $reset_array);
		
	}
	
	function assign_file($name, $val = '') {
	
		$this->xtpl->assign_file($name, $val);
		
	}
	
	function parse($bname) {
	
		$this->xtpl->parse($bname);
		
	}
	
	function rparse($bname) {
	
		$this->xtpl->rparse($bname);
		
	}
	
	function insert_loop($bname, $var, $value = '') {
	
		$this->xtpl->insert_loop($bname, $var, $value = '');
		
	}
	
	function array_loop($bname, $var, &$values) {
	
		$this->xtpl->array_loop($bname, $var, $values);
		
	}
	
	function text($bname = '') {
	
		$this->xtpl->text($bname);
		
	}
	
	function out($bname) {
	
		$this->xtpl->out($bname);
		
	}
	
	function out_file($bname, $fname) {
	
		$this->xtpl->out_file($bname, $fname);
		
	}
	
	function reset($bname) {
	
		$this->xtpl->reset($bname);
		
	}
	
	function parsed($bname) {
	
		$this->xtpl->parsed($bname);
		
	}
	
	function set_null_string($str, $varname = '') {
	
		$this->xtpl->set_null_string($str, $varname);
		
	}
	
	function SetNullString($str, $varname = '') {
	
		$this->xtpl->SetNullString($str, $varname);
		
	}
	
	function set_null_block($str, $bname = '') {
	
		$this->xtpl->set_null_block($str, $bname);
		
	}
	
	function SetNullBlock($str, $bname = '') {
	
		$this->xtpl->SetNullBlock($str, $bname);
		
	}
	
	function set_autoreset() {
	
		$this->xtpl->set_autoreset();
		
	}
	
	function clear_autoreset() {
	
		$this->xtpl->clear_autoreset();
		
	}
	
	function scan_globals() {
	
		$this->xtpl->scan_globals();
		
	}
	
	function get_error() {
	
		$this->xtpl->get_error();
		
	}
	
	
		
			
	
}