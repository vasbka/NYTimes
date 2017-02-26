<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 21:17
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesPluginMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_plugins_page(
            __('Sub plugins New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub plugins New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_plugins_menu',
            array($this,'render')
        );
    }

    public function render()
    {

        $param = __("Hello this page plugins",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubPluginsMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}