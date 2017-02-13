<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 21:17
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesMediaMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_media_page(
            __('Sub pages New York Times news',NYTIMES_PlUGIN_TEXTDOMAIN),
            __('Sub pages New York Times news',NYTIMES_PlUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_media_menu',
            array($this,'render')
        );
    }

    public function render()
    {

        $param = __("Hello this page media",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/SubPagesMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}