<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

$json = array(UserModel::displayAllUsers());
echo json_encode($json);