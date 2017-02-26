<?php

namespace includes\common;

class NYTimesLoaderScript
{
    private static $instance = null;
    private function __construct()
    {
        if (is_admin()) {
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin'));
            add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
        } else {
            add_action('wp_enqueue_scripts', array(&$this, 'loadScriptSite'));
            add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
            add_action('wp_footer', array(&$this, 'loadFooterScriptSite'));
        }
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function loadScriptAdmin($hook)
    {
        wp_register_script(
<<<<<<< HEAD
            NYTIMES_PLUGIN_SLUG.'-AdminMain',
            NYTIMES_PLUGIN_URL.'assets/admin/js/NYTimesAdminMain.js',
            array(
                'jquery'
            ),
            NYTIMES_PLUGIN_VERSION,
            true
        );
        wp_register_style(
            NYTIMES_PLUGIN_SLUG.'-AdminMainCss',
            NYTIMES_PLUGIN_URL.'assets/admin/css/NYTimesAdminMain.css',
            array(),
            NYTIMES_PLUGIN_VERSION
        );
        wp_enqueue_style(NYTIMES_PLUGIN_SLUG.'-AdminMainCss');
        wp_enqueue_script(NYTIMES_PLUGIN_SLUG.'-AdminMain');
=======
            NYTIMES_PlUGIN_SLUG.'-AdminMain',
            NYTIMES_PlUGIN_URL.'assets/admin/js/NYTimesAdminMain.js',
            array(
                'jquery'
            ),
            NYTIMES_PlUGIN_VERSION,
            true
        );
        wp_register_style(
            NYTIMES_PlUGIN_SLUG.'-AdminMainCss',
            NYTIMES_PlUGIN_URL.'assets/admin/css/NYTimesAdminMain.css',
            array(),
            NYTIMES_PlUGIN_VERSION
        );
        wp_enqueue_style(NYTIMES_PlUGIN_SLUG.'-AdminMainCss');
        wp_enqueue_script(NYTIMES_PlUGIN_SLUG.'-AdminMain');
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
        wp_enqueue_script('jquery');

    }
    public function loadHeadScriptAdmin()
    {
        //example var php to js
        ?>
        <script type="text/javascript">
                var NYTimesUrl;
<<<<<<< HEAD
                NYTimesUrl  = '<?php echo NYTIMES_PLUGIN_URL; ?>';
=======
                NYTimesUrl  = '<?php echo NYTIMES_PlUGIN_URL; ?>';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
        </script>
        <?php
        //end example var php to js
    }
    public function loadScriptSite($hook)
    {

    }
    public function loadHeadScriptSite()
    {

    }
    public function loadFooterScriptSite()
    {

    }

    }