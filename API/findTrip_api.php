<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/tripModel.php");
header('Content-Type: application/json');

//GET
//Affiche tous les trajets

$json = array(tripModel::findTrip());
echo json_encode($json);