<?php
/**
 * Copyright GreenImp Web - greenimp.co.uk
 * 
 * Author: GreenImp Web
 * Date Created: 19/04/13 15:24
 */

require_once(dirname(__FILE__) . '/PluginHandler.class.php');
 
class MyPlugin extends PluginHandler{
	public function __construct($name, $varName = null, $dbPrefix = null, $debug = false){
		parent::__construct($name, $varName, $dbPrefix, $debug);
	}
}
