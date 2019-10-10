<?php

if (!isset($_SESSION)) {
    session_start();
}
include "dbConnection.php";

class userModel
{
    public static function signUp()
    {
        global $bdd;

        $req = $bdd->prepare('INSERT INTO t_user (use_username, use_password, use_mail, use_age)
        VALUES (:username, :password, :email, :age)');
        $req->execute([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ]);
    }

    public static function signIn()
    {
        global $bdd;
        global $res;
        global $passwordCorrect;

        $req = $bdd->prepare('SELECT * FROM t_user WHERE use_username = :username');
        $req->execute([
            'username' => $_POST['username']
        ]);
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $passwordCorrect = password_verify($_POST['password'], $res['USE_PASSWORD']);
    }

    public static function displayProfile()
    {
        if (isset($_SESSION)) {
            global $bdd;

            $req = $bdd->prepare('SELECT * FROM t_user WHERE USE_ID =' . $_SESSION['id']);
            $req->execute();
            $userRequest = $req->fetchAll(PDO::FETCH_ASSOC);

            return $userRequest;
        }
    }

    public static function editProfile()
    {
        global $bdd;

        $req = $bdd->prepare('UPDATE t_user
            SET use_username = :username, use_password = :password, use_mail = :email, use_age = :age, use_tel = :tel, use_name = :name, use_fname = :fname, use_exp = :exp, use_status = :status, use_gender = :gender, use_bio = :bio, use_animals = :animals, use_smoke = :smoke
            WHERE USE_ID =' . $_SESSION['id']);
        $req->execute([
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'tel' => $_POST['tel'],
            'name' => $_POST['name'],
            'fname' => $_POST['fname'],
            'exp' => $_POST['exp'],
            'status' => $_POST['status'],
            'gender' => $_POST['gender'],
            'bio' => $_POST['bio'],
            'animals' => $_POST['animals'],
            'smoke' => $_POST['smoke'],
        ]);
    }

    public static function displayAllUsers(){
        global $bdd;

        $req = $bdd->prepare('SELECT * FROM t_user');
        $req->execute();
        $userInfo = $req->fetchAll(PDO::FETCH_ASSOC);
        return $userInfo;
    }

    public static function insertToken($token){
        global $bdd;

        $req = $bdd->prepare("UPDATE t_user SET use_token = '" . $token . "' WHERE use_username = :username");
        $req->execute([
            'username' => $_POST['username']
        ]);
    }

    public static function getToken(){
        global $bdd;

        $req = $bdd->prepare("SELECT use_token FROM t_user WHERE use_username = '" . $_POST['username'] . "'");
        $req->execute();
        $dbToken = $req->fetch(PDO::FETCH_ASSOC);
//        $safe = ($token == $dbToken['use_token']);

        return $dbToken;
    }

    public static function displayProfileWithToken()
    {
            global $bdd;

            $req = $bdd->prepare('SELECT * FROM t_user WHERE USE_USERNAME = :username');
            $req->execute([
                'username' => $_POST['username']
            ]);
            $userInfo = $req->fetchAll(PDO::FETCH_ASSOC);

            return $userInfo;
    }

    public static function editProfileWithToken()
    {
        global $bdd;

        $req = $bdd->prepare('UPDATE t_user
            SET use_username = :username, use_mail = :email, use_age = :age, use_tel = :tel, use_name = :lname, use_fname = :fname, use_bio = :bio
            WHERE USE_USERNAME = :username');
        $req->execute([
            'username' => $_POST['username'],
//            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'tel' => $_POST['tel'],
            'lname' => $_POST['lname'],
            'fname' => $_POST['fname'],
//            'exp' => $_POST['exp'],
//            'status' => $_POST['status'],
//            'gender' => $_POST['gender'],
            'bio' => $_POST['bio'],
//            'animals' => $_POST['animals'],
//            'smoke' => $_POST['smoke'],
        ]);
    }

    public static function destroyToken(){
        global $bdd;

        $req = $bdd->prepare("UPDATE t_user SET use_token = null WHERE USE_USERNAME = :username");
        $req->execute([
            'username' => $_POST['username']
        ]);
    }
}
