<?php
session_start();
require_once '../Model/dbConnection.php';
include '../Model/userModel.php';

if (!empty($_POST)) {

    userModel::signIn();

    if (!$res || !$passwordCorrect) {
        echo 'Mauvais login ou mot de passe !';
    } else {
        $_SESSION['id'] = $res['USE_ID'];
        $_SESSION['username'] = $res['USE_USERNAME'];

        header('Location: ../../public/?p=findTrip.html.php');
    }
}
