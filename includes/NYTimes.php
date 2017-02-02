<?php

class NYTimes{
    private static $instance = null;
    protected function __construct(){

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
