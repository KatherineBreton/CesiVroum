<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
header('Content-Type: application/json');

//POST
//Pour inscrire un nouvel utilisateur
//Variables : username, password, password_confirm, email, age

if(!empty($_POST) && ($_POST['password'] == $_POST['password_confirm'])){
    userModel::signUp();
    $json['success'] = true;
    $json['message'] = "l'utilisateur a bien été ajouté";
    echo json_encode($json);
}else{
    $json['message'] = "l'utilisateur n'a pas été ajouté";
    $json['success'] = false;
    echo json_encode($json);
}
