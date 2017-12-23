<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 20/12/2017
 * Time: 09:46
 */

class Helper extends db_object{

    protected static $db_table = "user_thumbnails";

    public static function get_user_thumbnails() {


        $sql  = "SELECT id, src, name FROM " . self::$db_table;
        $sql .= " ORDER BY name ASC";

        $thumbnails_result_set = self::find_by_direct_query($sql);
        return (!empty($thumbnails_result_set)) ? $thumbnails_result_set : false;



    }

}