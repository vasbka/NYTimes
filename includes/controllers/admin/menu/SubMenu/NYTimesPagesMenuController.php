<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 21:17
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesPagesMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_pages_page(
            __('Sub media New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub media New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_pages_menu',
            array($this,'render')
        );
    }

    public function render()
    {
        $param = __("Hello this page pages",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubMediaMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}