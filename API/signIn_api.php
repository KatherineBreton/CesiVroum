<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

//POST
//Permet à un utilisateur de se connecter
//Variables : username, password

if(!empty($_POST)){
    userModel::signIn();
    if(!$res || !$passwordCorrect){
        $json['success'] = false;
        $json['message'] = 'Mauvais login ou mot de passe';
        echo json_encode($json);
    }else{
        $uniqueId = bin2hex(random_bytes(16));
        $token = hash('sha256', $uniqueId);

        userModel::insertToken($token);

        $json['token'] = $token;
        $json['success'] = true;
        $json['message'] = 'Connexion réussie';

        echo json_encode($json);
    }
}
