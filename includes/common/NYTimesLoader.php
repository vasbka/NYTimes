<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 25.01.17
 * Time: 8:39 PM
 */

namespace includes\common;

//MainMenu
use includes\controllers\admin\menu\MainMenu\NYTimesAdminGuestBookController;
use includes\controllers\admin\menu\MainMenu\NYTimesAdminSubMenuController;
use includes\controllers\admin\menu\MainMenu\NYTimesMainAdminMenuController;
//End MainMenu

//Sub Menu

use includes\controllers\site\NYTimesSiteGuestBookController;
use includes\controllers\admin\menu\SubMenu\NYTimesCommentsMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesDashboardMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesManagementMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesMediaMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesOptionsMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesPagesMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesPluginMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesPostsMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesThemeMenuController;
use includes\controllers\admin\menu\SubMenu\NYTimesUsersMenuController;
//End Sub Menu

use includes\controllers\site\NYTimesLastNewsController;
//widget
use includes\ajax\NYTimesGuestBookAjaxHandler;
use includes\controllers\site\widget;
use includes\widgets;
use includes\widgets\NYTimesGuestBookDashboardWidget;


class NYTimesLoader
{
    private static $instance = null;

    private function __construct(){

        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {

            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();


    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
        NYTimesMainAdminMenuController::newInstance();
        NYTimesAdminSubMenuController::newInstance();
        NYTimesDashboardMenuController::newInstance();
        NYTimesPostsMenuController::newInstance();
        NYTimesMediaMenuController::newInstance();
        NYTimesPagesMenuController::newInstance();
        NYTimesCommentsMenuController::newInstance();
        NYTimesPluginMenuController::newInstance();
        NYTimesThemeMenuController::newInstance();
        NYTimesUsersMenuController::newInstance();
        NYTimesManagementMenuController::newInstance();
        NYTimesOptionsMenuController::newInstance();

        //work with db
        NYTimesAdminGuestBookController::newInstance();

        //ajax widget
        NYTimesGuestBookDashboardWidget::newInstance();

    }

    public function site(){
        NYTimesLastNewsController::newInstance();
        NYTimesSiteGuestBookController::newInstance();
        widget\NYTimesGUestBookShortCodesController::newInstance();
    }

    public function all(){
        NYTimesLocalization::getInstance();
        NYTimesLoaderScript::getInstance();
        NYTimesGuestBookAjaxHandler::newInstance();
    }
}