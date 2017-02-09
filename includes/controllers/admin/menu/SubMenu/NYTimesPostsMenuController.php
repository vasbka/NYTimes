<?php
/**
 * Created by PhpStorm.
 * User: василий
 * Date: 08.02.2017
 * Time: 20:57
 */

namespace includes\controllers\admin\menu\SubMenu;


class NYTimesPostsMenuController
    extends \includes\controllers\admin\menu\NYTimesAdminBaseMenuController
{

    public function action()
    {
        $pluginPage = add_posts_page(
            __('Sub posts New York Times',NYTIMES_PlUGIN_TEXTDOMAIN),
            __('Sub posts New York Times',NYTIMES_PlUGIN_TEXTDOMAIN),
            'read',
            'nytimes_control_sub_posts_menu',
            array($this,'render')
        );
    }

    public function render()
    {
        $param = __("Hello this page posts",NYTIMES_PlUGIN_TEXTDOMAIN);
        require_once NYTIMES_PlUGIN_DIR . 'includes/Views/Admin/SubPostsMenuView.php';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}