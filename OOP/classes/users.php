<?php
    require_once "config.php";
    class Users extends Config {

        public function __construct () {
            Parent::__construct();
        }
        
        public function getAllUsers (){
            $query = "SELECT * FROM users";
            $binder = null;
            return $this->read($query, $binder);
        }

        public function signUpUser ($full_name, $phone_no, $address, $email, $password){
            $query = "INSERT INTO test (full_name, phone_no, `address`, email, `password`) VALUES (?, ?, ?, ?, ?)";
            $binder = array ('sssss', $full_name, $phone_no, $address, $email, $password);
            return $this->create($query, $binder);
        }

        public function signIn ($email, $password){
            $query = "SELECT * FROM test WHERE `email`= ? AND `password` = ?";
            $binder = array('ss', $email,$password);
            return $this->read($query, $binder);
        }
    }
?>