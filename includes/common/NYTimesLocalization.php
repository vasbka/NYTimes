<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 26.01.17
 * Time: 12:40 PM
 */

namespace includes\common;


class NYTimesLocalization
{
    private static $instance = null;
    private function __construct() {
        add_action('plugins_loaded', array(&$this, 'localization'));

        add_action('plugin_title',function(){
            echo __('Заголовок',NYTIMES_PLUGIN_TEXTDOMAIN);
        },100);

        add_action('plugin_source',function(){
            echo __('Источник',NYTIMES_PLUGIN_TEXTDOMAIN);
        });

        add_action('plugin_date',function(){
            echo __('Дата публикации',NYTIMES_PLUGIN_TEXTDOMAIN);
        });

        add_action('plugin_not_found',function(){
            echo __('Ни одной записи по данной категории не найдено!',NYTIMES_PLUGIN_TEXTDOMAIN);
        });

        add_action('plugin_short',function(){
            echo __('Краткое описание',NYTIMES_PLUGIN_TEXTDOMAIN);
        });
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function localization(){
        /**
         * load_plugin_textdomain( $domain, $deprecated, $plugin_rel_path )
         * $domain - Уникальный идентификатор для получения строки перевода. (константа STEPBYSTEP_PlUGIN_TEXTDOMAIN
         *           заданая в файле config-path.php)
         * $deprecated - Отмененный аргумент, работает до версии 2.7. Путь подобный ABSPATH, до .mo файла.
         * $plugin_rel_path - Путь (с закрывающим слэшем) до каталога .mo файлов относительно WP_PLUGIN_DIR.
         *                    Этот аргумент следует использовать вместо $abs_rel_path.
         *                   (константа STEPBYSTEP_PlUGIN_DIR_LOCALIZATION заданая в файле config-path.php)
         */
        load_plugin_textdomain(NYTIMES_PLUGIN_TEXTDOMAIN, false, NYTIMES_PLUGIN_DIR_LOCALIZATION);
    }
}
