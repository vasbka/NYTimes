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
        wp_enqueue_script('jquery');

        //widget
        $version = null;
        wp_register_script(
            NYTIMES_PLUGIN_SLUG . '-Main',
            NYTIMES_PLUGIN_URL . 'assets/site/js/NYTimesMain.js',
            array(
                'query'
            ),
            $version,
            true
        );
        wp_enqueue_script( NYTIMES_PLUGIN_SLUG . '-Main' );
        $data = 'var ajaxurl = "' . NYTIMES_PLUGIN_AJAX_URL . '";';

        wp_add_inline_script( NYTIMES_PLUGIN_SLUG . '-Main', $data, 'before' );

    }
    public function loadHeadScriptAdmin()
    {
        //example var php to js
        ?>
        <script type="text/javascript">
                var NYTimesUrl;
                NYTimesUrl  = '<?php echo NYTIMES_PLUGIN_URL; ?>';
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