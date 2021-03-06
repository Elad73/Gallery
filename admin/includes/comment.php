<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 12:35
 */

class Comment extends Db_object {

    protected static $db_table = "comments";
    protected static $db_table_fields = array('photo_id', 'author', 'body');
    protected $id;
    protected $photo_id;
    protected $author;
    protected $body;
    protected $createdDate;

    public static function create_comment($photo_id, $author="John Doe", $body="") {

        if(!empty($photo_id) && !empty($author) && !empty($body)) {

            $comment = new Comment();

            $comment->set_photo_id((int)$photo_id);
            $comment->set_author($author);
            $comment->set_body($body);

            return $comment;
        }
        else {

            return false;
        }
    }

    public static function find_the_comments($photo_id=0) {

            global $database;

            $sql = "SELECT * FROM " . self::$db_table;
            $sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
            $sql .= " ORDER BY photo_id ASC";

            return self::find_by_query($sql);
    }

    public static function find_by_photo_id($photo_id){

        $sql = "SELECT * FROM " . static::$db_table . " WHERE photo_id = $photo_id ORDER BY createdDate DESC";
        $resultArr = static::find_by_query($sql);

        return (!empty($resultArr)) ? $resultArr : false;
    }


    //region Getters & Setters
    public function set_id($id){
        $this->id = $id;
    }

    public function set_photo_id($photo_id){
        $this->photo_id = $photo_id;
    }

    public function set_author($author){
        $this->author = $author;
    }

    public function set_body($body){
        $this->body = $body;
    }

    public function set_created_date($created_date){
        $this->createdDate = $created_date;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_photo_id(){
        return $this->photo_id;
    }

    public function get_author(){
        return $this->author;
    }

    public function get_body(){
        return $this->body;
    }

    public function get_created_date(){
        return $this->createdDate;
    }
    //endregion


} //End of the Class
