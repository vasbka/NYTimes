<?php

use includes\common\NYTimesLoader;

class NYTimes{
    private static $instance = null;
    protected function __construct(){
        NYTimesLoader::getInstance();
        add_action('plugins_loaded',array($this,'setDefaultOptions'));
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
            update_option(NYTIMES_PLUGIN_OPTION_PERIOD,"Arts");
        }
    }
}
NYTimes::getInstance();
