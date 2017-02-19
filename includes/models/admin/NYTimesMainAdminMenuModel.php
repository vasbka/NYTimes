<?php

namespace includes\models\admin;

class NYTimesMainAdminMenuModel
{
    public function __construct()
    {
        add_action('admin_init',array($this,'createOption'));
    }

    public function createOption()
    {
        register_setting('NYTimesMainSettings',NYTIMES_PLUGIN_OPTION_NAME,array($this,'saveOption'));

        add_settings_section('nytimes_account_section_id',__('Настройки плагина',NYTIMES_PLUGIN_TEXTDOMAIN),'','nytimes-development-plugin');
        add_settings_field(
            'nytimes_token_field_id',
            __('Ключ', NYTIMES_PLUGIN_TEXTDOMAIN),
            array($this, 'tokenField'),
            'nytimes-development-plugin',
            'nytimes-account-section-id'
        );
        add_settings_field(
            'nytimes_marker_field_id',
            __('Маркер', NYTIMES_PLUGIN_TEXTDOMAIN),
            array($this, 'markerField'),
            'nytimes-development-plugin',
            'nytimes-account-section-id'
        );


        add_settings_section('MySection',__('Конифгурация вывода постов по-умолчанию',NYTIMES_PLUGIN_TEXTDOMAIN),'','nytimes-development-plugin');
        register_setting('NYTimesMainSettings',NYTIMES_PLUGIN_OPTION_COUNTER,array($this,'saveOption'));
        register_setting('NYTimesMainSettings',NYTIMES_PLUGIN_OPTION_CATEGORY,array($this,'saveOption'));
        register_setting('NYTimesMainSettings',NYTIMES_PLUGIN_OPTION_PERIOD,array($this,'saveOption'));

        add_settings_field(
            'nytimes_counter_field_id',
            __('Количество постов: ', NYTIMES_PLUGIN_TEXTDOMAIN),
            array($this, 'counterField'),
            'nytimes-development-plugin',
            'MySection'
        );
        add_settings_field(
            'nytimes_category_field_id',
            __('Категория: ', NYTIMES_PLUGIN_TEXTDOMAIN),
            array($this, 'categoryField'),
            'nytimes-development-plugin',
            'MySection'
        );
        add_settings_field(
            'nytimes_period_field_id',
            __('За последние (дней): ', NYTIMES_PLUGIN_TEXTDOMAIN),
            array($this, 'periodField'),
            'nytimes-development-plugin',
            'MySection'
        );
    }
    public function saveOption($value)
    {
        return $value;
    }
    public function tokenField()
    {
        $option = get_option(NYTIMES_PLUGIN_OPTION_NAME);
        ?>
            <input type="text"
                   name="<?php echo NYTIMES_PLUGIN_OPTION_NAME; ?>[account][token]"
                   value="<?php echo esc_attr( $option['account']['token'] ) ?>"
            />
        <?php
    }
    public function markerField()
    {
        $option = get_option(NYTIMES_PLUGIN_OPTION_NAME);
        ?>
            <input type="text"
                   name="<?php echo NYTIMES_PLUGIN_OPTION_NAME; ?>[account][marker]"
                   value="<?php echo esc_attr( $option['account']['marker'] ) ?>"
            />
        <?php
    }
    public function counterField()
    {
        $option = get_option(NYTIMES_PLUGIN_OPTION_COUNTER);
        ?>
            <input  type="number"
                name="<?php echo NYTIMES_PLUGIN_OPTION_COUNTER; ?>"
                value="<?php echo esc_attr( $option ) ?>"/>

        <?php
    }
    public function categoryField()
    {
        $option = get_option(NYTIMES_PLUGIN_OPTION_CATEGORY);
        ?>
        <input  list="Category"
                name="<?php echo NYTIMES_PLUGIN_OPTION_CATEGORY; ?>"
                value="<?php echo esc_attr( $option ) ?>">
        <datalist id="Category">
            <option value="Arts">
            <option value="Blogs">
            <option value="Books">
            <option value="Education">
            <option value="Food">
            <option value="Health">
            <option value="Magazine">
            <option value="Movies">
            <option value="Multimedia">
        </datalist>

        <?php
    }

    public function periodField()
    {
        $option = get_option(NYTIMES_PLUGIN_OPTION_PERIOD);
        ?>
        <input  list="period"
                name="<?php echo NYTIMES_PLUGIN_OPTION_PERIOD; ?>"
                value="<?php echo esc_attr( $option ) ?>"/>
        <datalist id="period">
            <option value="1">
            <option value="7">
            <option value="30">
        </datalist>
        <?php
    }

    public static function newInstance()
    {
        $instance = new self;
        return $instance;
    }
}