<?php

namespace includes\controllers\admin\menu;

abstract class NYTimesAdminBaseMenuController
{
    public function __construct()
    {
        add_action('admin_menu',array($this,'action'));
    }
    abstract public function action();
    abstract public function render();
<<<<<<< HEAD
    protected function loadView($view, $type = 0, $data = array())
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
=======
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
}