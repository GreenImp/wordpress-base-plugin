<?php
if(!function_exists('add_action')){ exit; }

/**
 * Copyright GreenImp Web - greenimp.co.uk
 * 
 * Author: GreenImp Web
 * Date Created: 19/04/13 10:26
 */
/**
 * @package my-plugin
 * @version 0.1
 */
/*
Plugin Name: My Plugin
Plugin URI:
Description: 
Author: Lee Langley
Version: 0.1
Author URI: greenimp.co.uk
*/

require_once(dirname(__FILE__) . '/classes/MyPlugin.class.php');

// initialise the base class
$myPlugin = new MyPlugin('Plugin Name', 'pluginVariableName', null, true);
