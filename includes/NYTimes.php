<?php

namespace includes;

use includes\common\NYTimesLoader;
use includes\models\admin\NYTimesGuestBookModel;
use includes\custom_post_type;

class NYTimes{
    private static $instance = null;
    protected function __construct(){
        NYTimesLoader::getInstance();
        add_action('plugins_loaded',array($this,'setDefaultOptions'));
        new custom_post_type\NewsPostType();
    }
    public static function getInstance(){
        if( null == self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }
    static public function activation(){
        NYTimesGuestBookModel::createTable();
        error_log('plugin_activate');

    }
    static public function deactivation(){
        error_log('plugin deactivation');
        delete_option(NYTIMES_PLUGIN_OPTION_VERSION);
        delete_option(NYTIMES_PLUGIN_OPTION_NAME);
        delete_option(NYTIMES_PLUGIN_OPTION_COUNTER);
    }
    public function setDefaultOptions()
    {
        if( ! get_option(NYTIMES_PLUGIN_OPTION_NAME))
        {
            update_option(NYTIMES_PLUGIN_OPTION_NAME,\includes\common\NYTimesDefaultOption::getDefaultOption());
        }
        if( ! get_option(NYTIMES_PLUGIN_OPTION_VERSION))
        {
            update_option(NYTIMES_PLUGIN_OPTION_VERSION,NYTIMES_PLUGIN_VERSION);
        }
        if( ! get_option(NYTIMES_PLUGIN_OPTION_COUNTER))
        {
            update_option(NYTIMES_PLUGIN_OPTION_COUNTER,1);
        }
        if( ! get_option(NYTIMES_PLUGIN_OPTION_CATEGORY))
        {
            update_option(NYTIMES_PLUGIN_OPTION_CATEGORY,"Arts");
        }
        if( ! get_option(NYTIMES_PLUGIN_OPTION_PERIOD))
        {
            update_option(NYTIMES_PLUGIN_OPTION_PERIOD,"7");
        }
    }
}
NYTimes::getInstance();
