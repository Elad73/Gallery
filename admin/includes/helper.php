<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 20/12/2017
 * Time: 09:46
 */

class Helper extends db_object{

    protected static $db_table = "user_thumbnails";
    protected static $db_table_fields = array('id', 'name', 'src');
    protected $id;
    protected $name;
    protected $src;

    // region Getters & Setters
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param mixed $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

    //endregion


    public static function get_user_thumbnails() {


        $sql  = "SELECT id, src, name FROM " . self::$db_table;
        $sql .= " ORDER BY name ASC";

        $thumbnails_result_set = self::find_by_direct_query($sql);
        return (!empty($thumbnails_result_set)) ? $thumbnails_result_set : false;



    }

    public static function display_sidebar_data($thumbnail_id){

        $thumbnail = self::find_by_id($thumbnail_id);

        $output = "<a class='thumbnail' href='#'><img width='100' src='{$thumbnail->getSrc()}' ></a>";
        $output .= "<p>{$thumbnail->getName()}</p>";

        echo $output;
    }

}