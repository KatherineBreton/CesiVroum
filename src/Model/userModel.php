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

        print_r($_POST);
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
        print_r($_POST);

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
}
