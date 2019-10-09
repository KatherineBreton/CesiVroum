<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
require_once ("tokenVerify.php");
header('Content-Type: application/json');

userModel::verifyToken();
var_dump($token);
//if($token == ){
//    $json = array(userModel::displayProfile());
//    echo json_encode($json);
//}else{
//    $json['success'] = false;
//    $json['message'] = 'Une erreur est survenue';
//}

