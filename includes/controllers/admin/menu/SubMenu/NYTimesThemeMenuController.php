<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 21:17
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesThemeMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_theme_page(
            __('Sub theme New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub theme New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_theme_menu',
            array($this,'render')
        );
    }

    public function render()
    {

        $param = __("Hello this page theme",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubThemeMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}