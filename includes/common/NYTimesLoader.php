<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 25.01.17
 * Time: 8:39 PM
 */

namespace includes\common;

//MainMenu
use \Includes\controllers\admin\menu\MainMenu\NYTimesAdminSubMenuController;
use \Includes\controllers\admin\menu\MainMenu\NYTimesMainAdminMenuController;
//End MainMenu

//Sub Menu
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesCommentsMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesDashboardMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesManagementMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesMediaMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesOptionsMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesPagesMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesPluginMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesPostsMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesThemeMenuController;
use \Includes\Controllers\Admin\Menu\SubMenu\NYTimesUsersMenuController;
use \Includes\Controllers\Site\NYTimesLastNewsController;


//End Sub Menu


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
    }

    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
        NYTimesLastNewsController::newInstance();
    }

    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
        NYTimesLocalization::getInstance();
        NYTimesLoaderScript::getInstance();
    }
}