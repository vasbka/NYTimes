<?php


namespace Includes\Models\Site;

use Includes\Common\NYTimesRequestApi;

class NYTimesLastNewsShortCodeModel
{
    public function __construct()
    {
    }
    public function getData($category, $period)
    {
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getCacheKey($category,$period);

        if( false === ($data=get_transient($cacheKey)))
        {
            $requestAPI = NYTimesRequestApi::getInstance();
            $data = $requestAPI->getLastNews($category,$period);
            set_transient($cacheKey,$data,100);
        }
        return $data;
    }
    public function getCacheKey($category,$period)
    {
        return NYTIMES_PlUGIN_TEXTDOMAIN."_nytimes_last_news_{$category}_period_{$period}";
    }
    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}