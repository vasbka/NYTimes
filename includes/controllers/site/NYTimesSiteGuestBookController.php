<?php

namespace includes\controllers\site;

use includes\models\admin\NYTimesGuestBookModel;
use includes\models\site\NYTimesSiteGuestBookModel;

class NYTimesSiteGuestBookController
    extends NYTimesShortCodesController
{

    public function __construct()
    {
        parent::__construct();

    }
    public function initShortCode()
    {
        // TODO: Implement initShortCode() method.
        add_shortcode('otherShort',array($this,'action'));
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


    public function action($atts = array(), $content = '', $tag = '')
    {
        $action = isset( $_GET['action'] )
            ? $_GET['action']
            : null;

        $data = array();
        $pathView = NYTIMES_PLUGIN_DIR;
        switch ( $action )
        {
            case "add_data":
                $pathView .= "/includes/Views/site/NYTimesGuestBookAddView.php";
                $this->loadView($pathView, 0, $data);
                break;
            case "insert_data":
                if( isset( $_POST ) )
                {
                    $id = NYTimesSiteGuestBookModel::insert( array(
                        'user_name'=>$_POST[ 'user_name' ],
                        'date_add'=>time(),
                        'message'=>$_POST[ 'message' ]
                    ));
                    $this->redirect("sample-page?page=nytimes_control_sub_geust_menu");
                }
                break;
            default:
                $data = NYTimesSiteGuestBookModel::getAll();
                $pathView .= "/includes/Views/site/NYTimesGuestBookView.php";
                $this->loadView($pathView, 0, $data);
        }
    }
    public function render($data)
    {
        require_once $data;
    }
    private function loadView($view, $type = 0, $data = array())
    {

        if(file_exists($view))
        {
            switch($type)
            {
                case 0:
                    require_once $view;
                    break;
                case 1:
                    require $view;
                    break;
                default:
                    require_once $view;
                    break;
            }
        }else{
            wp_die(sprintf(__('(View %s not found)', NYTIMES_PLUGIN_TEXTDOMAIN),$view));
        }
    }
}