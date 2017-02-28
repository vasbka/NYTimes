<?php

namespace includes\custom_post_type;

class NewsPostType
{
    public function __construct()
    {
        add_action( 'init', array( $this, 'registerNewsPostType' ) );

        add_action( 'init', array( $this, 'createNewsTaxonomies' ) );

        add_filter( 'post_updated_messages', array( $this, 'newsUpdateMessage' ) );

        add_action( 'contextual_help', array( $this, 'addHelpText' ), 10, 3 );

        add_action( 'add_meta_boxes', array( $this, 'categoryExtraFields' ), 0);

        add_action( 'save_post', array( $this, 'categoryExtraFieldsUpdate' ) );
    }

    public function registerNewsPostType()
    {
        register_post_type( 'news', array(
            'labels'            =>  array
            (
                'name'               => 'Новости',
                'singular_name'      => 'Новость',
                'add_new'            => 'Добавить новость',
                'add_new_item'       => 'Добавить новую новость',
                'edit_item'          => 'Редактировать новость',
                'new_item'           => 'Новая новость',
                'view_item'          => 'Посмотреть новость',
                'search_items'       => 'Найти новость',
                'not_found'          => 'Новостей не найдено',
                'not_found_in_trash' => 'В корзине новостей не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Новости'
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title','editor', 'comments'),
            'taxonomies'          => array( 'category', 'news'),
        ) );
    }

    public function newsUpdateMessage()
    {
        global $post;

        $messages[ 'news' ] = array(
            0 => '',
            1 => sprintf( 'Новость обновлено. <a href="%s">Посмотреть новость news</a>', esc_url( get_permalink( $post->ID ) ) ),
            2 => 'Произвольное поле обновлено.',
            3 => 'Произвольное поле удалено.',
            4 => 'Запись news обновлена.',
            5 => isset( $_GET[ 'revision' ]) ? sprintf( 'Запись news восстановлена из ревизии %s', wp_post_revision_title( (int)$_GET[ 'revision' ],false) ) : false,
            6 => sprintf( 'Запись news опубликована. <a href="%s">Перейти к записи news</a>', esc_url( get_permalink($post->ID) ) ),
            7 => 'Запись news сохранена.',
            8 => sprintf( 'Запись news сохранена. <a target="_blank" href="%s">Предпросмотр записи news</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
            9 => sprintf( 'Запись news запланирована на <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр записи</a>',
                            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) )
            ),
            10 => sprintf( 'Черновик записи newsобновлен. <a target="_blank" href="%s">Предпросмотр записи news</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
        );
        return $messages;
    }

    public function addHelpText( $contextual_help, $screen_id, $screen )
    {
        if( 'news' == $screen_id )
        {
            $contextual_help =
            '
                <p>Напоминалка при редактировании записи news:</p>
                <ul>
                    <li>Указать категорию, например политика или исскуство.</li>                    
                </ul>
                <p>Если нужно запланировать публикацию на будущее:</p>
                <ul>
                    <li>В блоке с кнопкой "опубликовать" нажмите редактировать дату.</li>
                    <li>Измените дату на нужную, будущую и подтвердите изменения кнопкой ниже "ОК".</li>
                </ul>
            ';
        }
        else if( 'edit-news' == $screen_id )
        {
            $contextual_help =  '<p>Это раздел помощи показанный для типа записи news и т.д. и т.п.</p>';
        }

        return $contextual_help;
    }

    public function createNewsTaxonomies()
    {
        $labels = array(
            'name' => _x('Category', 'taxonomy general name'),
            'singular_name' => _x('Category', 'taxonomy singular name'),
            'search_items' => __('Search Categorys'),
            'all_items' => __('All Categorys'),
            'parent_item' => __('Parent Category'),
            'parent_item_colon' => __('Parent Category:'),
            'edit_item' => __('Edit Category'),
            'update_item' => __('Update Category'),
            'add_new_item' => __('Add New Category'),
            'new_item_name' => __('New Category Name'),
            'menu_name' => __('Category'),
        );

        register_taxonomy('category', array('news'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'category'),
        ));
    }
    public function categoryExtraFields(){
        add_meta_box(
            'rate_field', // id атрибут HTML тега, контейнера блока.
            'Оценка автора', // Заголовок/название блока. Виден пользователям.
            array( &$this, 'renderRateFields' ),  //Функция, которая выводит на экран HTML содержание блока
            'news', // Название экрана для которого добавляется блок.
            'normal', // Место где должен показываться блок
            'high' // Приоритет блока для показа выше или ниже остальных блоков:
        );
    }

    public function renderRateFields($post){
        ?>
        <p>
            <label>
                Рейтинг от 1 до 12
                <br>
                <input type="number" name="rate[rate]" value="<?php echo get_post_meta($post->ID, 'rate', 1); ?>" min="1" max="12" />
            </label>
        </p>
        <?php
    }

    public function categoryExtraFieldsUpdate($post_id ){
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // выходим если это автосохранение

        if( !isset($_POST['rate']) ) return false; // выходим если данных нет

        // Все ОК! Теперь, нужно сохранить/удалить данные
        $priceExtra = array_map('trim', $_POST['rate']); // чистим все данные от пробелов по краям
        foreach( $priceExtra as $key=>$value ){
            if( empty($value) ){
                delete_post_meta($post_id, $key); // удаляем поле если значение пустое
                continue;
            }
            update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
        }
        return $post_id;
    }


}