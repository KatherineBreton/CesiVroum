<?php


try {

    $dsn_bdd = 'mysql:host=localhost;dbname=cesi-vroum';
    $user_bdd = 'root';
    $pass_bdd = '';
    $options = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $bdd = new PDO($dsn_bdd, $user_bdd, $pass_bdd, $options);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}
