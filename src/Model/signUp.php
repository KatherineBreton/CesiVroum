<?php


$req = $bdd->prepare('INSERT INTO t_user (use_username, use_password, use_mail, use_age)
    VALUES (:username, :password, :email, :age)');
    $req->execute([
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ]);
