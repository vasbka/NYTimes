<?php

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesDashboardMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_dashboard_page(
            __('Sub dashboard New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            __('Sub dashboard New York Times news',NYTIMES_PLUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_dashboard_menu',
            array($this,'render')
        );
    }

    public function render()
    {
        $param = __("Hello this page dashboards",NYTIMES_PLUGIN_TEXTDOMAIN);
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/SubDashboardMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}