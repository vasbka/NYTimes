<?php

namespace Includes\Controllers\Site;

abstract class NYTimesShortCodesController
{
    public function __construct()
    {
        add_action('wp_loaded',array($this,'initShortCode'));
    }
    abstract public function initShortCode();
    abstract public function action($atts = array(), $content = '',$tag = '');
    abstract public function render($data);
}