<?php
/**
 * Created by PhpStorm.
 * User: vasilijgoncharenko
 * Date: 16.01.17
 * Time: 9:50 PM
 */

define("NYTIMES_PLUGIN_DIR", plugin_dir_path(__FILE__));

define("NYTIMES_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("NYTIMES_PLUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(NYTIMES_PLUGIN_DIR)));
define("NYTIMES_PLUGIN_TEXTDOMAIN", str_replace( '_', '-', NYTIMES_PLUGIN_SLUG ));
define("NYTIMES_PLUGIN_OPTION_VERSION", NYTIMES_PLUGIN_SLUG.'_version');
define("NYTIMES_PLUGIN_OPTION_NAME", NYTIMES_PLUGIN_SLUG.'_options');
define("NYTIMES_PLUGIN_OPTION_COUNTER",NYTIMES_PLUGIN_SLUG.'_counter');
define("NYTIMES_PLUGIN_OPTION_CATEGORY",NYTIMES_PLUGIN_SLUG.'_category');
define("NYTIMES_PLUGIN_OPTION_PERIOD",NYTIMES_PLUGIN_SLUG.'_period');
define("NYTIMES_PLUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(NYTIMES_PLUGIN_DIR.'/'.basename(NYTIMES_PLUGIN_DIR).'.php', false, false);

define("NYTIMES_PLUGIN_VERSION", $TPOPlUGINs['Version']);
define("NYTIMES_PLUGIN_NAME", $TPOPlUGINs['Name']);

define("NYTIMES_PLUGIN_DIR_LOCALIZATION", dirname( plugin_basename( __FILE__ ) ) . '/languages/');

