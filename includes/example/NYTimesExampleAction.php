<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 20.01.17
 * Time: 1:33 PM
 */

namespace includes\example;


class NYTimesExampleAction
{
    public function __construct() {
        add_action('plugins_loaded', function(){ error_log(__('Hello world!', NYTIMES_PlUGIN_TEXTDOMAIN)); }, 100);

    }
    public static function newInstance(){
        $instance = new self;
        return $instance;
    }



}