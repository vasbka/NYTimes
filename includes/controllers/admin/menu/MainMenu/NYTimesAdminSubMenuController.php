<?php

namespace Includes\Controllers\Admin\Menu\MainMenu;


class NYTimesAdminSubMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{
    
    public function action()
    {
        $plugin_page = add_submenu_page(
<<<<<<< HEAD
            NYTIMES_PLUGIN_TEXTDOMAIN,
            _x(
                'Sub New York Times',
                'admin menu page',
                NYTIMES_PLUGIN_TEXTDOMAIN
=======
            NYTIMES_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub New York Times',
                'admin menu page',
                NYTIMES_PlUGIN_TEXTDOMAIN
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
            ),
            _x(
                'Sub New York Times',
                'admin menu page',
<<<<<<< HEAD
                NYTIMES_PLUGIN_TEXTDOMAIN
=======
                NYTIMES_PlUGIN_TEXTDOMAIN
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
            ),
            'manage_options',
            'nytimes_control_sub_menu',
            array($this,'render')
        );
    }

    public function render()
    {
<<<<<<< HEAD
        $param = __("Hello world sub menu",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubMenuView.php';
=======
        $param = __("Hello world sub menu",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/SubMenuView.php';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }

}


