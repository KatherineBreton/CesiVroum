<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/tripModel.php");
header('Content-Type: application/json');

$json = array(tripModel::displayTrip());
echo json_encode($json);