<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
require_once ("verifyToken.php");
header('Content-Type: application/json');

//POST
//Permet à l'utilisateur connecté de se déconnecter
//Variables : token, username

if(verifyToken()){
    $json['success'] = true;
    $json['message'] = "L'utilisateur a bien été déconnecté";
    userModel::destroyToken();
    echo json_encode($json);
}else{
    $json['success'] = false;
    $json['message'] = "Erreur";
    echo json_encode($json);
}