<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 18/11/2017
 * Time: 11:40
 */

class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
    protected $id;
    protected $title;
    protected $description;
    protected $filename;
    protected $type;
    protected $size;

    protected $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public  $upload_errors_array = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize declared",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."

    );

    /**
     * This  is passing $_FILES['uploaded_file'] as an argument
     * @param $file
     * @return bool
     */
    public function set_file($file) {

        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        }
        elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }
        else {

            $this->set_filename(basename($file['name']));
            $this->set_tmp_path($file['tmp_name']);
            $this->set_type($file['type']);
            $this->set_size($file['size']);
        }

    }

    //region Getters & Setters
    public function set_id($id){
        $this->id = $id;
    }

    public function set_title($title){
        $this->title = $title;
    }

    public function set_description($description){
        $this->description = $description;
    }

    public function set_filename($filename){
        $this->filename = $filename;
    }

    public function set_type($type){
        $this->type = $type;
    }

    public function set_size($size){
        $this->size = $size;
    }

    public function set_tmp_path($tmp_path) {
        $this->tmp_path = $tmp_path;

    }

    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return $this->title;
    }

    public function get_description(){
        return $this->description;
    }

    public function get_filename(){
        return $this->filename;
    }

    public function get_type(){
        return $this->type;
    }

    public function get_size(){
        return $this->size;
    }

    public function get_tmp_path() {
        return $this->tmp_path;

    }
    //endregion




} //End of class