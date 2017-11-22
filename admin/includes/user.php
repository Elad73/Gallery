<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 13/10/2017
 * Time: 12:35
 */

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    private $id;
    protected $username;
    protected $first_name;
    protected $last_name;
    protected $password;

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
    //endregion






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
