<?php

namespace Includes\Controllers\Admin\Menu\MainMenu;


class NYTimesAdminSubMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{
    
    public function action()
    {
        $plugin_page = add_submenu_page(
            NYTIMES_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub New York Times',
                'admin menu page',
                NYTIMES_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub New York Times',
                'admin menu page',
                NYTIMES_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'nytimes_control_sub_menu',
            array($this,'render')
        );
    }

    public function render()
    {
        $param = __("Hello world sub menu",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/SubMenuView.php';
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }

}


