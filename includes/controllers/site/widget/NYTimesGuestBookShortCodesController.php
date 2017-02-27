<?php

namespace includes\controllers\site\widget;


use includes\controllers\site\NYTimesShortCodesController;

class NYTimesGuestBookShortCodesController
    extends NYTimesShortCodesController
{

    public function initShortCode()
    {
        add_shortcode( 'ny_times_guest_book', array( $this, 'action' ) );
    }

    public function action($atts = array(), $content = '', $tag = '')
    {
        return $this->render( array() );
    }

    public function render($data)
    {
        $output = '';
        $output .= '<form method="post">' .
                        '<label>' . __( 'User name', NYTIMES_PLUGIN_TEXTDOMAIN) . '</label>' .
                        '<input type="text" name="nytimes_user_name" class="nytimes_user_name">' .
                        '<label> ' . __( 'Message', NYTIMES_PLUGIN_TEXTDOMAIN) . '</label>' .
                        '<textarea name="nytimes_message" class="nytimes_message"></textarea>' .
                        '<button class="nytimes_button_add">' . __( 'Add', NYTIMES_PLUGIN_TEXTDOMAIN) . '</button>' .
                '</form>';
        return $output;
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }

}
