<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/tripModel.php");
header('Content-Type: application/json');

$json = tripModel::createTrip();
