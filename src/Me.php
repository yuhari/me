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
namespace me ;

use me/Component ;

class Me {
	
	protected $component = array() ;
	public static $instance = null ; 
	
	public function __construct() {
		$args = func_get_args() ;
		foreach($args as $arg){
			if ($arg instanceof Component){
				$this->load($component) ;
			}
		}
	}
	
	public function run() {
		static::$instance = $this ;
	}
	
	public static function app() {
		if (static::$instance != null){
			return static::$instance ;
		}
		return null ;
	}
	
	public function __call($key) {
		if (substr($key, 0, 3) == 'get'){
			$key = substr($key, 3) ;
			return $this->$key ;
		}
		return false  ;
	}
	
	public function __get($key) {
		if (isset($this->component[$key])){
			return $this->component[$key]->exec() ;
		}
		return null ;
	}
	
	public function getKeys(){
		return array_keys($this->component) ;
	}
	
	public function load($component) {
		if ($component instanceof Component) {
			$key = $component->getComponentName() ? $component->getComponentName() : strtolower(get_class($component));
			$this->component[$key] = $component ;
		}
	}
	
	public function unload($componentName) {
		if (isset($this->component[$componentName])) {
			unset($this->component[$componentName]) ;
		}
	}
}	
