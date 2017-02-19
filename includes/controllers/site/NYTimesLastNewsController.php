<?php

namespace includes\controllers\site;

use includes\models\site\NYTimesLastNewsShortCodeModel;

class NYTimesLastNewsController
    extends NYTimesShortCodesController
{

    public $model;
    private $countNews;
    public function __construct()
    {
        parent::__construct();
        $this->model = NYTimesLastNewsShortCodeModel::newInstance();
    }

    public function initShortCode()
    {
        // TODO: Implement initShortCode() method.
        add_shortcode('NYTimes',array($this,'action'));
    }

    public function action($atts = array(), $content = '', $tag = '')
    {
        // TODO: Implement action() method.
        $atts = shortcode_atts( array(
            'cat' => get_option(NYTIMES_PLUGIN_OPTION_CATEGORY),
            'period' => get_option(NYTIMES_PLUGIN_OPTION_PERIOD),
            'counter' => get_option(NYTIMES_PLUGIN_OPTION_COUNTER)
        ),$atts,$tag);
        $data = $this->model->getData($atts['cat'],$atts['period']);
        $this->countNews = $atts['counter'];
        if($data == false)
            return $this->render(false);
        return $this->render($data);
    }
    public function render($rez)
    {
        if($rez){
            for($i = 0;$i<$this->countNews;$i++){
                if($i<count($rez)) {
                    if (array_key_exists(0, $rez)):?>
                        <p id="NYTimesTitle">
                            <?php do_action('plugin_title');
                            echo ' : ' . $rez[$i]->title ?>
                        </p>
                        <?php if (array_key_exists('url', $rez[$i]->media[0]->{'media-metadata'}[2])): ?>
                            <img src="<?php echo $rez[$i]->media[0]->{'media-metadata'}[2]->url ?>">
                        <? endif; ?>
                        <p id="NYTimesSource">
                            <?php do_action('plugin_source');
                            echo ' : ' . $rez[$i]->source; ?>
                        </p>
                        <p id="NYTimesPublishDate">
                            <?php do_action('plugin_date');
                            echo ' : ' . $rez[$i]->{'published_date'} ?>
                        </p>
                        <p id="NYTimesAbstract">
                            <?php do_action('plugin_short');
                            echo " : " . $rez[$i]->abstract ?>
                        </p>
                        <a href="<? echo $rez[$i]->url ?>" id="NYTimesReadMore"> Read more. . . </a><br><br>
                        <?php
                    endif;
                }
                else {
                    echo __('Sorry,but it`s all last news',NYTIMES_PLUGIN_TEXTDOMAIN);
                    break;
                }
            }
        }else
            echo __('Sorry, no posts for your query.',NYTIMES_PLUGIN_TEXTDOMAIN);
    }


    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }

}