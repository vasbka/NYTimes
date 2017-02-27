<?php

namespace includes\controllers\admin\menu\MainMenu;

use includes\controllers\admin\menu\NYTimesAdminBaseMenuController;
use includes\models\admin\NYTimesGuestBookModel;

class NYTimesAdminGuestBookController
    extends NYTimesAdminBaseMenuController
{


    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
            NYTIMES_PLUGIN_TEXTDOMAIN,
            _x(
                'Guest book',
                'admin menu page',
                NYTIMES_PLUGIN_TEXTDOMAIN
            ),
            _x(
                'Guest book',
                'admin menu page',
                NYTIMES_PLUGIN_TEXTDOMAIN
            ),
            'read',
            'nytimes_control_sub_geust_menu',
            array($this,'render')
        );

    }

    public function render()
    {
        // TODO: Implement render() method.
        /*
             В Гостевой книги может быть несколько view (Отображение данных таблицы,
             Добавление данных в таблице, Редактирование данных в таблице,
             Удаление данных с таблицы). Что бы определить контролеру какое действие в данный
             момент обрабатывать к ссылке будет добляться $_GET['action']. Мы его можем получить
             и определить какой view подшружать странице.
         */

        $action = isset( $_GET['action'] )
            ? $_GET['action']
            : null;

        $data = array();
        $pathView = NYTIMES_PLUGIN_DIR;
        
        switch ( $action )
        {
            case "add_data":
                $pathView .= "includes/Views/admin/NYTimesGuestBookAddView.php";
                $this->loadView( $pathView, 0, $data );
                break;
            case "insert_data":
                if( isset( $_POST ) )
                {
                    $id = NYTimesGuestBookModel::insert( array(
                        'user_name'=>$_POST[ 'user_name' ],
                        'date_add'=>time(),
                        'message'=>$_POST[ 'message' ]
                    ));
                    $this->redirect("admin.php?page=nytimes_control_sub_geust_menu");
                }

                break;
            case "edit_data":
                if( isset( $_GET['id'] ) && !empty( $_GET['id'] ))
                {
                    $data = NYTimesGuestBookModel::getById( (int)$_GET['id'] );
                    $pathView .= "includes/views/admin/NYTimesGuestBookMenuEditView.php";
                    $this->loadView( $pathView, 0, $data );
                }
                break;
            case "update_data":
                if( isset( $_POST ) )
                {
                    NYTimesGuestBookModel::updateById(
                        array(
                            'user_name'=>$_POST['user_name'],
                            'date_add'=>time(),
                            'message'=>$_POST['message']
                        ),
                        $_POST['id']
                    );
                    $this->redirect("admin.php?page=nytimes_control_sub_geust_menu");
                }

                break;
            case "delete_data":
                if( isset($_GET['id'] ) && ! empty( $_GET['id'] ))
                {
                    NYTimesGuestBookModel::deleteById( (int)$_GET['id'] );
                    $this->redirect("admin.php?page=nytimes_control_sub_geust_menu");
                }

                break;
            default:
                $data = NYTimesGuestBookModel::getAll();
                $pathView .= "/includes/Views/admin/NYTimesGuestBookView.php";
                $this->loadView($pathView, 0, $data);
        }


    }

    public function redirect( $page = '' )
    {
        echo '<script type = "text/javascript">
                document.location.href="' . $page . '";
            </script>';
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}