<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

//POST
//Permet de vérifier le token en bdd avec le token de l'utilisateur pour confirmer qu'il est connecté
//Variables : token, username

function verifyToken(){
    $dbToken = userModel::getToken();
    if($_POST['token'] == $dbToken['use_token'] && $_POST['token'] != null){
       return true;
    }else{
        return false;
    }
}