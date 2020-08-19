<?php
/*
Plugin Name: OnlyFans Link
Plugin URI:
Description: Displays OnlyFans link and icon
Version: 0.1.0
Author: Hunter McCartin
Author URI:

*/

if(!defined('ABSPATH')){
  exit;
}
//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/onlyfanslink-scripts.php');

//Load Class
require_once(plugin_dir_path(__FILE__).'/includes/onlyfanslink-class.php');

//Register
function register_onlyfanslink(){
  register_widget('OnlyFans_Link_Widget');
}

// Hook in function
add_action('widgets_init','register_onlyfanslink');
