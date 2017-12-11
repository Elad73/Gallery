<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 12:35
 */

class Comment extends Db_object {

    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
    protected $id;
    protected $photo_id;
    protected $author;
    protected $body;

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
    //endregion


} //End of the Class
