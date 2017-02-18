<?php

use includes\common\NYTimesLoader;

class NYTimes{
    private static $instance = null;
    protected function __construct(){
        NYTimesLoader::getInstance();
    }
    public static function getInstance(){
        if( null == self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }
    static public function activation(){
        error_log('plugin activation');
    }
    static public function deactivation(){
        error_log('plugin deactivation');
    }
    
}
NYTimes::getInstance();
