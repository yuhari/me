<?php
/**
 * 
 *
 * @author yuhari
 * @version $Id$
 * @copyright , 24 November, 2016
 * @package default
 */

/**
 * Define DocBlock
 */
namespace me/components ;

use me/Component ;

class Configs implements Component {
	
	public $configs = array() ;
	
	public function __construct() {
		if (defined('DIR_ROOT')) {
			$this->configs = include_once DIR_ROOT . '/configs/main.php' ;
		}else {
			$this->configs = include_once DIR .'/../default/configs/main.php' ;
		}
	}
	
	public function getComponentName() {
		return 'configs' ;
	}
	
	public function exec() {
		return $this ;
	}
	
	public function __call($key) {
		if (substr($key, 0, 3) == 'get'){
			$key = substr($key, 3) ;
			return $this->$key ;
		}
		return false  ;
	}
	
	public function __get($key) {
		if (isset($this->configs[$key])){
			return $this->configs[$key] ;
		}
		return null ;
	}
	
	public function __set($key, $value) {
		$this->configs[$key] = $value ;
	}
}