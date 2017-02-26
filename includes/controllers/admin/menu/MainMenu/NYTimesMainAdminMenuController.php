<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 19:41
 */

namespace Includes\Controllers\Admin\Menu\MainMenu;


<<<<<<< HEAD
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

=======
class NYTimesMainAdminMenuController
    extends \Includes\Controllers\Admin\Menu\NYTimesAdminBaseMenuController
{
    public static $MENU = true;
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
    public function action()
    {
        $plugionPage = add_menu_page(
            __(
                'New York Times',
                'admin menu page',
<<<<<<< HEAD
                NYTIMES_PLUGIN_TEXTDOMAIN
=======
                NYTIMES_PlUGIN_TEXTDOMAIN
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
            ),
            __(
                'New York Times',
                'admin menu page',
<<<<<<< HEAD
                NYTIMES_PLUGIN_TEXTDOMAIN
            ),
            'manage_options',
            NYTIMES_PLUGIN_TEXTDOMAIN,
=======
                NYTIMES_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            NYTIMES_PlUGIN_TEXTDOMAIN,
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
            array($this,'render'),
            'dashicons-welcome-widgets-menus'
        );
    }

    public function render()
    {
<<<<<<< HEAD
        $param = __("Welcome to Main Menu!",NYTIMES_PLUGIN_TEXTDOMAIN);
        $requestAPI = NYTimesRequestApi::getInstance();
        require_once NYTIMES_PLUGIN_DIR . 'includes/Views/admin/MenuView.php';
=======
        $param = __("Welcome to Main Menu!",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/MenuView.php';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}
