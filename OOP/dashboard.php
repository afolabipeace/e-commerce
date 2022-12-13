<?php
    require "classes/users.php";
    require "../vendor/autoload.php";
    use Firebase\JWT;
    use Firebase\JWT\Key;
    $allheaders = getallheaders();
    $jwtToken = $allheaders['authorization'];
    $jwt =  trim(substr($jwtToken, 7));
    $decodeJwt = \Firebase\JWT\JWT::decode($jwt, new Key('peace', 'HS256'));
   
    echo json_encode($decodeJwt);
?>