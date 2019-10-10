<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

//GET
//Affiche tous les utilisateurs

$json = array(UserModel::displayAllUsers());
echo json_encode($json);