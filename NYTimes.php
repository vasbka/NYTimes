<?php
/*
Plugin Name: NYTimes
Plugin URI: https://github.com/vasbka/NYTimes
Description: News from NYTimes.
Version: 3.0
Author: vasiliygoncarenko
Text Domain: NYTimes
Domain Path: /languages/
License: A "Slug" license name e.g. GPL2
*/
<<<<<<< HEAD
=======

<<<<<<< HEAD
require_once plugin_dir_path(__FILE__).'/config-path.php';
require_once plugin_dir_path(__FILE__) . '/includes/common/NYTimesAutoload.php';
require_once plugin_dir_path(__FILE__).'/includes/NYTimes.php';
=======
require_once plugin_dir_path(__FILE__) . '/config-path.php';

require_once NYTIMES_PlUGIN_DIR.'/includes/common/NYTimesAutoload.php';
require_once plugin_dir_path(__FILE__).'/includes/NYTimes.php';
>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c

require_once plugin_dir_path(__FILE__).'/config-path.php';
require_once plugin_dir_path(__FILE__) . '/includes/common/NYTimesAutoload.php';
require_once plugin_dir_path(__FILE__).'/includes/NYTimes.php';
>>>>>>> d9eec25e1752111bd5b7644b602140994fa8d522
register_activation_hook( __FILE__, array('NYTimes' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('NYTimes' ,  'deactivation' ) );

<<<<<<< HEAD
=======
function NYTimesFunc($attr)
{
    $response = wp_remote_get( 'https://api.nytimes.com/svc/mostpopular/v2/mostemailed/'.$attr['cat'].'/1.json?api-key=938fae85fed74306994ef2d016a9d9a1');
    $rez = json_decode($response['body'],true)['results'];
    if( array_key_exists(0, $rez)):?>
        <p id="NYTimesTitle">
            <?php do_action('plugin_title');echo ' : '.$rez[0]['title']?>
        </p>
        <?php if( array_key_exists(2,$rez[0]['media'][0]['media-metadata']) ):?>
            <img src="<?php echo $rez[0]['media'][0]['media-metadata'][2]['url']?>">
        <? endif;?>
        <p id="NYTimesSource">
            <?php do_action('plugin_source');echo ' : '.$rez[0]['source']?>
        </p>
        <p id="NYTimesPublishDate">
            <?php do_action('plugin_date');echo ' : '.$rez[0]['published_date']?>
        </p>
        <p id="NYTimesAbstract">
            <?php do_action('plugin_short');echo " : ".$rez[0]['abstract']?>
        </p>
        <a href="<?echo $rez[0]['url']?>" id="NYTimesReadMore"> Read more. . . </a>
<?php
    endif;
    if( ! array_key_exists(0, $rez) )
        echo 'No one post for last day.';

}
add_shortcode( 'NYTimes', 'NYTimesFunc' );

>>>>>>> e8afda74497fbfce08de8132b6cc90558001df3c
