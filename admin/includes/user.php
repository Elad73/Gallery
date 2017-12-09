<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 12:35
 */

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'image_src');
    protected $id;
    protected $username;
    protected $first_name;
    protected $last_name;
    protected $password;
    protected $image_src;

    protected $tmp_path;
    public $upload_directory = "images\\users";
    public $image_placeholder = "http://placehold.it/100x100&text=image";

    //region Getters & Setters
    public function set_id($id){
        $this->id = $id;
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function set_first_name($first_name){
        $this->first_name = $first_name;
    }

    public function set_last_name($last_name){
        $this->last_name = $last_name;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_image_src($image_src){
        $this->image_src = $image_src;
    }

    public function set_tmp_path($tmp_path){
        return $this->tmp_path = $tmp_path;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_first_name(){
        return $this->first_name;
    }

    public function get_last_name(){
        return $this->last_name;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_image_src(){
        return $this->image_src;
    }

    public function get_tmp_path(){
        return $this->tmp_path;
    }
    //endregion

    public function photo_path($name) {

        return $this->upload_directory . DS . $name;
    }

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

            //$type = substr($file['type'], strpos($file['type'], '/') + 1);
            //$name =  hash('md5', basename($file['name'])) . '.' . $type;
            $name =  date('Y_m_d_H_i_s_') . basename($file['name']);
            $this->set_image_src($this->photo_path($name));
            $this->set_tmp_path($file['tmp_name']);
            //$this->set_type();
            //$this->set_size($file['size']);
            //$this->set_src($this->photo_path());

            return true;
        }

    }

    public function save_user_and_image() {

        if (!empty($this->errors)) {
            return false;
        }

        if (empty($this->get_image_src() || empty($this->get_tmp_path()))) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->get_image_src();

        if (file_exists($target_path)) {
            $this->errors[] = "The file {$this->get_image_src()} already exists";
            return false;
        }

        if(move_uploaded_file($this->get_tmp_path(), $target_path)) {
            if ($this->save()) {
                $tmp = $this->get_tmp_path();
                unset($tmp);
                return true;
            }
        }
        else {
            //if nothing worked
            $this->errors[] = "The file directory probably does not have permissions";
            return false;
        }


        return false;
    }


    public function image_path_placeholder() {

        return empty($this->get_image_src()) ? $this->image_placeholder : $this->get_image_src();
    }


    //ToDo: needs to understand why function query is failing with the escape cleaned...

    public static function verify_user($username, $password) {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql  = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $users_array = self::find_by_query($sql);
        return (!empty($users_array)) ? array_shift($users_array) : false;

    }




} //End of the Class
