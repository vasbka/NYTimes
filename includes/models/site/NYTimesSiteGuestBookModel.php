<?php

namespace includes\models\site;

class NYTimesSiteGuestBookModel
{
    const NYTIMES_TABLE_NAME = "nytimes_guest_book";

    static public function getTableName()
    {
        global $wpdb;
        return $wpdb->prefix .static::NYTIMES_TABLE_NAME;
    }

    static public function createTable()
    {
        global $wpdb;
        $tableName = self::getTableName();
        $sql = "CREATE TABLE " . $tableName . "(
                    id int(11) NOT NULL AUTO_INCREMENT,
                    date_add int(11) NOT NULL,
                    user_name varchar(255) NOT NULL,
                    message text NOT NULL,
                    PRIMARY KEY(id)
                    ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        if($wpdb->get_var("show tables like '$tableName'")!=$tableName)
        {
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    public static function insert( $data )
    {
        global $wpdb;
        $id = $wpdb->insert( self::getTableName(), $data );
        return $id;
    }

    public static function getAll()
    {
        if( self::getTableName() == false ) return false;
        global $wpdb;
        $data = $wpdb->get_results( " SELECT * FROM " . self::getTableName() . " ORDER BY date_add DESC",ARRAY_A);
        if( count( $data ) > 0 ) return $data;
        return false;
    }

}