<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/tripModel.php");
require_once ("verifyToken.php");
header('Content-Type: application/json');

//POST
//Permet à l'utilisateur de poster un nouveau trajet
//Variables : start, arrival, start_lgt, arrival_lgt, start_ltd, arrival_ltd, departtime, arrivaltime, price, token, username

if(verifyToken() && !empty($_POST)){
    tripModel::createTrip();
    $json['success'] = true;
    $json['message'] = "Le trajet a bien été créé";
    echo json_encode($json);
}else{
    $json['success'] = false;
    $json['message'] = "Erreur";
    echo json_encode($json);
}


