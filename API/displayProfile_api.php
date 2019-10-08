<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

$json = array(userModel::displayProfile());
echo json_encode($json);