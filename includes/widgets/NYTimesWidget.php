<?php


namespace includes\widgets;

use includes\models\admin;

class NYTimesWidget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            "ny_times_guest_book",
            "NYTimes Guest Book Widget",
            array("description" => "Guest book")
        );
    }

    public function form($instance)
    {
        $title = "";
        $text = "";
        if( ! empty( $instance ) )
        {
            $title = $instance["title"];
            $text = $instance["text"];
        }

        $tableId = $this->get_field_id("title");
        $tableName = $this->get_field_name("title");
        echo '<label for ="' . $tableId . '">Title</label><br>';
        echo '<input id="' . $tableId . '" type="text" name="' . $tableName . '" value="' . $title . '"><br>"';

        $textId = $this->get_field_id("text");
        $textName = $this->get_field_name("text");
        echo '<label for="' . $tableId . '">Text</label><br>"';
        echo '<textarea id="' . $textId . '" name="' . $textName . '">' . $text . '</textarea>';


    }

    public function update( $newInstance, $oldInstance )
    {
        $values = array();
        $values[ "title" ] = htmlentities( $newInstance[ "title" ] );
        $values[ "text" ] = htmlentities( $newInstance[ "text" ]);
        return $values;
    }
    public function widget( $args, $instance )
    {
        $title = $instance[ "title" ];
        $text = $instance[ "text" ];

        echo "<h2>$title</h2>";
        echo "<p>$text</p>";

        $data = admin\NYTimesGuestBookModel::getAll();

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
        $instance = new self;
        return $instance;
    }
}