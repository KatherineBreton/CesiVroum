<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
require_once ("verifyToken.php");
header('Content-Type: application/json');

//POST
//Affiche le profil de l'utilisateur connecté
//Variables : username, token, 

if(verifyToken()){
    $json = array(userModel::displayProfileWithToken());
    $json['success'] = true;
    $json['message'] = "Le profil de l'utilisateur est affiché";
    echo json_encode($json);
}else{
    $json['success'] = false;
    $json['message'] = "Erreur";
    echo json_encode($json);
}