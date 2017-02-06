<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.01.17
 * Time: 9:50 PM
 */

define("NYTIMES_PlUGIN_DIR", plugin_dir_path(__FILE__));

define("NYTIMES_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("NYTIMES_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(NYTIMES_PlUGIN_DIR)));
define("NYTIMES_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', NYTIMES_PlUGIN_SLUG ));
define("NYTIMES_PlUGIN_OPTION_VERSION", NYTIMES_PlUGIN_SLUG.'_version');
define("NYTIMES_PlUGIN_OPTION_NAME", NYTIMES_PlUGIN_SLUG.'_options');
define("NYTIMES_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(NYTIMES_PlUGIN_DIR.'/'.basename(NYTIMES_PlUGIN_DIR).'.php', false, false);

define("NYTIMES_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("NYTIMES_PlUGIN_NAME", $TPOPlUGINs['Name']);

define("NYTIMES_PlUGIN_DIR_LOCALIZATION", dirname( plugin_basename( __FILE__ ) ) . '/languages/');


