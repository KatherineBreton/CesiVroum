<?php

class userController
{
    public static function signUp()
    {
        //include '../Model/userModel.php';

        if (!empty($_POST) && ($_POST['password'] == $_POST['password_confirm'])) {

            userModel::signUp();

            header('Location: ../../public/index.php');
        } else {
            header('Location: ../../public/index.php/?p=signUpError');
        }
    }

    public static function signIn()
    {
        session_start();

        include '../Model/userModel.php';

        if (!empty($_POST)) {

            userModel::signIn();

            if (!$res || !$passwordCorrect) {
                echo 'Mauvais login ou mot de passe !';
            } else {
                $_SESSION['id'] = $res['USE_ID'];
                $_SESSION['username'] = $res['USE_USERNAME'];

                header('Location: ../../public/index.php');
            }
        }
    }

    public static function logOut()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: ../../public/index.php');
    }

    public static function displayProfile() {

    }

    public static function editProfile() {

    }

    public static function signUpCheck() {

    }
}
