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
}