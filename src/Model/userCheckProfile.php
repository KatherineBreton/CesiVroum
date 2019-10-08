<?php

$req = $bdd->prepare('SELECT use_username FROM t_user WHERE use_username =' . $_SESSION['username'] . "'");
$req->execute([
    'username' => $_POST['username']
]);
$res = $req->fetch(PDO::FETCH_ASSOC);
