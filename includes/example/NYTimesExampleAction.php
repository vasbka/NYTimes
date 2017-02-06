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
        add_action('plugin_title',function(){
            echo __('Заголовок',NYTIMES_PlUGIN_TEXTDOMAIN);
        },100);
        add_action('plugin_source',function(){
            echo __('Источник',NYTIMES_PlUGIN_TEXTDOMAIN);
        });
        add_action('plugin_date',function(){
            echo __('Дата публикации',NYTIMES_PlUGIN_TEXTDOMAIN);
        });
        add_action('plugin_not_found',function(){
            echo __('Ни одной записи по данной категории не найдено!',NYTIMES_PlUGIN_TEXTDOMAIN);
        });
        add_action('plugin_short',function(){
            echo __('Краткое описание.',NYTIMES_PlUGIN_TEXTDOMAIN);
        });

    }
    public static function newInstance(){
        $instance = new self();
        return $instance;
    }
}