<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 21:17
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesUsersMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_users_page(
            __('Sub users New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub users New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_users_menu',
            array($this,'render')
        );
    }

    public function render()
    {

        $param = __("Hello this page users",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubUsersMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}