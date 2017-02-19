<?php

namespace includes\common;

class NYTimesRequestApi
{
    const NYTIMES_API = "https://api.nytimes.com/svc/mostpopular/v2/mostemailed/";
    const NYTIMES_TOKEN = "938fae85fed74306994ef2d016a9d9a1";
    private static $instance = null;

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function getLastNews( $category, $period)
    {
        $category = '/' . $category;
        $period = '/' . $period;
        $requestURL = self::NYTIMES_API.$category.$period.'.json?api-key='.self::NYTIMES_TOKEN;
        return $this->requestAPI($requestURL);

    }
    public function requestAPI($requestURL)
    {
        $response = wp_remote_get($requestURL, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )));
        $body = wp_remote_retrieve_body($response);
        $rez = json_decode($body);

        if ($rez->status=='OK') {
            return $rez->results;
        } else {
            return false;
        }
    }
}