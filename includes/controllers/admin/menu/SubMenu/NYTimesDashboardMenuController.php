<?php

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesDashboardMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_dashboard_page(
<<<<<<< HEAD
            __('Sub dashboard New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub dashboard New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
=======
            __('Sub dashboard New York Times news',NYTIMES_PlUGIN_TEXTDOMAIN),
            __('Sub dashboard New York Times news',NYTIMES_PlUGIN_TEXTDOMAIN),
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
            'read',
            'nytimes_control_sub_dashboard_menu',
            array($this,'render')
        );
    }

    public function render()
    {
<<<<<<< HEAD
        $param = __("Hello this page dashboards",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubDashboardMenuView.php';
=======
        $param = __("Hello this page dashboards",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/SubDashboardMenuView.php';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}