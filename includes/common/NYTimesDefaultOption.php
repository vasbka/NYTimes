<?php

namespace includes\common;

class NYTimesDefaultOption
{
    public static function getDefaultOption()
    {
        $defaults = array(
            'account' => array(
                'marker'=>'',
                'token'=>''
            )
        );
        $defaults = apply_filters('nytimes_option',$defaults);
        return $defaults;
    }
}