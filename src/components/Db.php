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
use me/Me ;

use me/base/Mysql ;

class Db implements Component {
	
	public function getComponentName() {
		return 'db' ;
	}
	
	public function exec(){
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
		$db_conf = Me::app()->configs->db->$key ;
		if (!empty($db_conf)){
			return new Mysql($db_conf) ;
		}
		return null ;
	}
	
}
