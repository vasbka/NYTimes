<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 19:41
 */

namespace Includes\Controllers\Admin\Menu\MainMenu;


use includes\common\NYTimesRequestApi;
use includes\controllers\admin\menu\NYTimesAdminBaseMenuController;
use includes\models\admin\NYTimesMainAdminMenuModel;

class NYTimesMainAdminMenuController
    extends NYTimesAdminBaseMenuController
{
    public $model;
    public static $MENU = true;
    public function __construct()
    {
        parent::__construct();
        $this->model = NYTimesMainAdminMenuModel::newInstance();
    }

    public function action()
    {
        $plugionPage = add_menu_page(
            __(
                'New York Times',
                'admin menu page',
                NYTIMES_PLUGIN_TEXTDOMAIN
            ),
            __(
                'New York Times',
                'admin menu page',
                NYTIMES_PLUGIN_TEXTDOMAIN
            ),
            'manage_options',
            NYTIMES_PLUGIN_TEXTDOMAIN,
            array($this,'render'),
            'dashicons-welcome-widgets-menus'
        );
    }

    public function render()
    {
        $param = __("Welcome to Main Menu!",NYTIMES_PLUGIN_TEXTDOMAIN);
        $requestAPI = NYTimesRequestApi::getInstance();
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/MenuView.php';
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}
