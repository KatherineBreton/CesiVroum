<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
require_once ("signIn_api.php");
//header('Content-Type: application/json');

$var = userModel::verifyToken();
var_dump($var);

var_dump($token);