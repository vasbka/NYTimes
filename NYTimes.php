<?php
/*
Plugin Name: NYTimes
Plugin URI: https://github.com/vasbka/NYTimes
Description: News from NYTimes.
Version: 2.0
Author: vasiliygoncarenko
Text Domain: NYTimes
Domain Path: /languages/
License: A "Slug" license name e.g. GPL2
*/

require_once plugin_dir_path(__FILE__) . '/config-path.php';

require_once NYTIMES_PlUGIN_DIR.'/includes/common/NYTimesAutoload.php';
require_once plugin_dir_path(__FILE__).'/includes/NYTimes.php';

register_activation_hook( __FILE__, array('NYTimes' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('NYTimes' ,  'deactivation' ) );

