<?php

<<<<<<< HEAD

namespace includes\common;

=======
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 17.01.17
 * Time: 1:46 AM
 */
namespace includes\common;
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
class NYTimesAutoload
{
    private static $instance = null;
    private function __construct() {
        spl_autoload_register(array($this, 'autoloadNamespace'));
    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $className
     */
    public function autoloadNamespace($className){
<<<<<<< HEAD
        $fileClass = NYTIMES_PLUGIN_DIR . '/'.str_replace("\\","/",$className).'.php';
=======
        $fileClass = NYTIMES_PlUGIN_DIR.'/'.str_replace("\\","/",$className).'.php';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
        if (file_exists($fileClass)) {
            if (!class_exists($fileClass, FALSE)) {
                require_once $fileClass;
            }
        }
    }
}
NYTimesAutoload::getInstance();