<?php

require_once("config.php");

class Database {

    private $connection;

    function __construct() {
        $this->open_db_connection();
    }

    function get_connection() {

        //returning mysqli object
        return $this->connection;
    }


    public function open_db_connection() {

        $this->connection = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);


        if($this->connection->connect_errno) {

            die("Database connection failed badly" . $this->connection->connect_error);
        }
    }

    public function query($sql){

        //var_dump("before: " .$sql);
        $escaped_sql = $this->escape_string($sql);
        //var_dump("after: " .$escaped_sql);
        //$result = $this->connection->query($sql);
        $result = mysqli_query($this->connection,$sql);
        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result) {

        if(!$result){
            die("Query Failed" . $this->connection->error);
        }
    }

    public function escape_string($string){

        //$escaped_string = $this->connection->real_escape_string($string);
        $escaped_string = mysqli_real_escape_string($this->connection,$string);
        return $escaped_string;

    }

    /**
     * Getting the last id inserted to the database
     * @return int|string
     */
    public function the_insert_id(){

        //return $this->connection->insert_id;
        return mysqli_insert_id($this->connection);

    }


} //End of class Database




$database = new Database();