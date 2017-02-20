
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
    <!-- Проверка данных на пустоту чтобы цыкл не вернул ошибку -->
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
            <td></td>
        </tr>
    <?php } ?>

    </tbody>
</table>
<a href="sample-page?page=nytimes_control_sub_geust_menu&action=add_data">
    <?php _e('Add', NYTIMES_PLUGIN_TEXTDOMAIN ); ?>
</a>
