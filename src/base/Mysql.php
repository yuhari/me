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
class Mysql extends \PDO {
	
	protected $driver = 'mysql' ;
	
	public function __construct($conf) {
		$dns = $this->driver . ':host=' . $conf['host']  . (!empty($conf['port']) ? ';port=' . $conf['port'] : '') . ';dbname=' . $conf['schema'] ;
		$user = !empty($conf['user']) ? $conf['user'] : 'root' ;
		$passwd = !empty($conf['passwd']) ? $conf['passwd'] : 'root' ;
		
		parent::__construct($dns, $user, $passwd) ;
	}
}
