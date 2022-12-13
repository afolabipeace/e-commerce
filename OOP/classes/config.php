<?php
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Headers: Content-Type, authorization");


    class Config {
        protected $localhost = "localhost";
        protected $username ="root";
        protected $dbName = "phpclass";
        protected $password = "";
        public $connectDb = "";
        public $res = [];

        public function __construct (){
            $this->connectDb = new mysqli($this->localhost, $this->username, $this->password, $this->dbName);
            if($this->connectDb->connect_error){
                die("unable to connect". $this->connectDb->connect_error);
            }
        }

        public function create ($query, $binder) {
            $statement= $this->connectDb->prepare($query);
            $statement->bind_param(...$binder);
            if($statement->execute()){
                $this->res['success'] = true;
            }else{
                $this->res['success'] = false;
            }
            return $this->res;
        }

        public function read ($query, $binder) {
            $statement = $this->connectDb->prepare($query);
            if($binder){
                $statement->bind_param(...$binder);
            }
            $getResult = $statement->execute();
            if($getResult){
                $fetch = $statement->get_result();
                $this->res["success"] = true;
                $this->res["result"] = mysqli_fetch_all($fetch, MYSQLI_ASSOC) ;
            }
            else{
                $this->res["success"] = false;
            }
            return $this->res;

        }

        public function update () {

        }

        public function delete () {

        }
    }
?>