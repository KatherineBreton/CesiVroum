<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/tripModel.php");
header('Content-Type: application/json');

//POST
//Affiche un trajet en particulier

$json = array(tripModel::displayTrip());
echo json_encode($json);