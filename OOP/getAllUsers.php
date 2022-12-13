<?php
    require "classes/users.php";
    $user = new Users();

    $getAllUsers = $user->getAllUsers();
    // echo json_encode($getAllUsers)
    print_r($getAllUsers['result']);



?>