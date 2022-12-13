<?php
    require realpath("vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    // $localhost = 'localhost';
    // $username = 'root';
    // $db_name = 'phpclass';
    // $password = '';
    $localhost=$_ENV['LOCALHOST'];
    $username=$_ENV['USERNAME'];
    $password=$_ENV['PASSWORD'];
    $db_name=$_ENV['DBNAME'];

    $connectDb = new mysqli($localhost, $username, $password, $db_name);

    if ($connectDb->connect_error) {
        die('unable to connect'. $connectDb->connect_error);
    }else {
        
    }

?>