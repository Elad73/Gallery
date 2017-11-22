<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 14/10/2017
 * Time: 05:33
 */



class Session{

    private $signed_in = false;
    private $user_id;
    private $message;

    function __construct(){

        session_start();
        $this->check_the_login();
        $this->check_message();
    }

    //region Getters & Setters
    public function set_user_id($user_id){
        $this->user_id = $user_id;
    }

    public function set_signed_in($signed_in){
        $this->signed_in = $signed_in;
    }

    public function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else {
            $this->message = "";
        }
    }

    public function get_signed_in(){
        return $this->signed_in;
    }

    public function get_message() {
        return $this->message;
    }
    //endregion

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->set_user_id($_SESSION['user_id']);
            $this->set_signed_in(true);
            return true;
        }
        else{
            unset($this->user_id);
            $this->set_user_id(null);
            $this->set_signed_in(false);
            return false;
        }

    }

    public function is_signed_in() {
        return $this->get_signed_in();
    }

    public function login($user){

        if($user){
            $_SESSION['user_id'] = $user->get_id();
            $this->set_user_id($_SESSION['user_id']);
            $this->set_signed_in(true);
        }

    }

    public function logout(){

        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->set_signed_in(false);

    }

    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        }
        else {
            return $this->get_message();
        }
    }


}

$session = new Session();