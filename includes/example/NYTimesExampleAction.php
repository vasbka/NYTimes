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
        
    }
    public static function newInstance(){
        $instance = new self();
        return $instance;
    }
}