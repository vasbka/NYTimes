<?php

namespace includes\widgets;

use includes\models\admin\NYTimesGuestBookModel;

class NYTimesGuestBookDashboardWidget
{
    public function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'addDashboardWidgets' ) );
        add_action( 'wp_dashboard_setup', array( $this, 'removeDashboardWidgets' ) );
    }
    public function removeDashboardWidgets(){
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    }
    public function addDashboardWidgets(){
        add_meta_box(
            'nytimes_guest_book_dashboard_widget_new',
            __('Guest book', NYTIMES_PLUGIN_TEXTDOMAIN),
            array( $this, 'renderDashboardWidget' ),
            'dashboard',
            'side',
            'high'
        );

        global $wp_meta_boxes;
        $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
        $example_widget_backup = array('nytimes_guest_book_dashboard_widget' => $normal_dashboard['nytimes_guest_book_dashboard_widget']);
        unset($normal_dashboard['nytimes_guest_book_dashboard_widget']);
        $sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
    }

    public function renderDashboardWidget(){

        $data = NYTimesGuestBookModel::getAll();
        ?>
        <table  border="1">
            <thead>
            <tr>
                <td>
                    <?php _e('Name', NYTIMES_PLUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Messsage', NYTIMES_PLUGIN_TEXTDOMAIN ); ?>
                </td>
                <td>
                    <?php _e('Date', NYTIMES_PLUGIN_TEXTDOMAIN ); ?>
                </td>

            </tr>
            </thead>
            <tbody>
            <?php if(count($data) > 0 && $data !== false){  ?>
                <?php foreach($data as $value): ?>
                    <tr class="row table_box">

                        <td>
                            <?php echo $value['user_name']; ?>
                        </td>
                        <td>
                            <?php echo $value['message']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                        </td>



                    </tr>
                <?php endforeach ?>
            <?php }else{ ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}