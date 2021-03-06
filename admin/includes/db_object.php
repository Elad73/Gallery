<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 18/11/2017
 * Time: 08:46
 */

class Db_object {

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

    public static function
    instantiation($row){
        $calling_class = get_called_class();
        $instance = new $calling_class;

        foreach ($row as $key => $value){
            $instance->set_property($key, $value);
        }

        return $instance;
    }

    protected function get_properties() {

        $properties = array();

        foreach (static::$db_table_fields as $db_field) {

            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;

            }
        }

        return $properties;
    }

    public function set_property($key, $value){

        if($this->has_property($key)){
            $this->$key = $value;
            return true;
        }
        return false;
    }

    protected function clean_properties() {
        global $database;

        $clean_properties = array();

        foreach ($this->get_properties() as $key => $value) {

            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;

    }


    public function has_property($key){
        $properties = get_object_vars($this);

        return array_key_exists($key, $properties);
    }


    public static function find_all(){

        $sql = "SELECT * FROM " . static::$db_table;
        return static::find_by_query($sql);
    }

    public static function find_all_ordered($order = 1, $direction = "ASC"){

        $sql = "SELECT * FROM " . static::$db_table . " ORDER BY " . $order . " " . $direction;
        return static::find_by_query($sql);
    }

    public static function find_by_id($id){

        $sql = "SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1";
        $resultArr = static::find_by_query($sql);

        return (!empty($resultArr)) ? array_shift($resultArr) : false;
    }

    /**
     * @param $sql
     * @return array of user object instantiated  by the rows of 'users' table
     */
    public static  function find_by_query($sql){
        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;

    }

    /**
     * @param $sql
     * @return array populated with the rows fetched from the db. not objects.
     */
    public static function find_by_direct_query($sql) {

        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = $row;
        }

        return $the_object_array;
    }

    public function save() {

        return ($this->get_id() != null) ? $this->update() : $this->create();
    }

    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . " (" . implode("," , array_keys($properties)) . ") ";
        $sql .= "VALUES ('"  . implode("', '" , array_values($properties)) . "' )";

        if($database->query($sql)) {

            $this->set_id($database->the_insert_id());
            return true;

        } else {
            return false;

        }
    }

    public function update(){
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " . $database->escape_string($this->get_id());

        $database->query($sql);

        return (mysqli_affected_rows($database->get_connection()) == 1) ? true : false;

    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE id = " . $database->escape_string($this->get_id()) . " ";
        $sql .= "LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->get_connection()) == 1) ? true : false;

    }

    public static function count_all() {
        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);


    }
}

