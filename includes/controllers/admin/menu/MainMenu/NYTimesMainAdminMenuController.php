<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 19:41
 */

namespace Includes\Controllers\Admin\Menu\MainMenu;


class NYTimesMainAdminMenuController
    extends \Includes\Controllers\Admin\Menu\NYTimesAdminBaseMenuController
{
    public static $MENU = true;
    public function action()
    {
        $plugionPage = add_menu_page(
            __(
                'New York Times',
                'admin menu page',
                NYTIMES_PlUGIN_TEXTDOMAIN
            ),
            __(
                'New York Times',
                'admin menu page',
                NYTIMES_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            NYTIMES_PlUGIN_TEXTDOMAIN,
            array($this,'render'),
            'dashicons-welcome-widgets-menus'
        );
    }

    public function render()
    {
        $param = __("Welcome to Main Menu!",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/MenuView.php';
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}
