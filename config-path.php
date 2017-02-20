<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: vasilijgoncharenko
=======
 * User: romansolomashenko
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
 * Date: 16.01.17
 * Time: 9:50 PM
 */

<<<<<<< HEAD
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
=======
define("NYTIMES_PlUGIN_DIR", plugin_dir_path(__FILE__));

define("NYTIMES_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("NYTIMES_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(NYTIMES_PlUGIN_DIR)));
define("NYTIMES_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', NYTIMES_PlUGIN_SLUG ));
define("NYTIMES_PlUGIN_OPTION_VERSION", NYTIMES_PlUGIN_SLUG.'_version');
define("NYTIMES_PlUGIN_OPTION_NAME", NYTIMES_PlUGIN_SLUG.'_options');
define("NYTIMES_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
<<<<<<< HEAD
$TPOPlUGINs = get_plugin_data(NYTIMES_PLUGIN_DIR.'/'.basename(NYTIMES_PLUGIN_DIR).'.php', false, false);

define("NYTIMES_PLUGIN_VERSION", $TPOPlUGINs['Version']);
define("NYTIMES_PLUGIN_NAME", $TPOPlUGINs['Name']);

define("NYTIMES_PLUGIN_DIR_LOCALIZATION", dirname( plugin_basename( __FILE__ ) ) . '/languages/');
=======
$TPOPlUGINs = get_plugin_data(NYTIMES_PlUGIN_DIR.'/'.basename(NYTIMES_PlUGIN_DIR).'.php', false, false);

define("NYTIMES_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("NYTIMES_PlUGIN_NAME", $TPOPlUGINs['Name']);

define("NYTIMES_PlUGIN_DIR_LOCALIZATION", dirname( plugin_basename( __FILE__ ) ) . '/languages/');
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c


