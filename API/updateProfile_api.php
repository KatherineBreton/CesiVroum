<?php
require_once ("../src/Model/dbConnection.php");
require_once ("../src/Model/userModel.php");
require_once ("verifyToken.php");
header('Content-Type: application/json');

//POST
//Permet à un utilisateur de modifier son profil
//Variables : username, email, age, tel, lname, fname, bio, token

if(verifyToken()){
    userModel::editProfileWithToken();
    $json['success'] = true;
    $json['message'] = "Le profil a bien été modifié";
    echo json_encode($json);
}else{
    $json['success'] = false;
    $json['message'] = "Un erreur s'est produite, le profil n'a pas pu être modifié";
    echo json_encode($json);
}
