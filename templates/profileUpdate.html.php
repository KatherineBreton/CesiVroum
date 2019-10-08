<?php
ob_start();
session_start();
$bodyClass = '';
$title = "Modifier mon profil";

include('../src/Model/userModel.php');
//include('../src/Controller/userController.php');
include('../src/Controller/editProfile.php');
?>
<form action="../src/Controller/editProfile.php" method="post">
    <label for="username">Pseudo :</label>
    <input id="username" type="text" name="username" value="">

    <label for="use_name">Nom</label>
    <input id="use_name" type="text" name="use_name" value="">

    <label for="f_name">Prénom :</label>
    <input id="f_name" type="text" name="f_name" value="">

    <label for="age">Âge :</label>
    <input id="age" type="text" name="age" value="">

    <label for="avatar">Avatar :</label>
    <input id="avatar" type="text" name="avatar" value="">

    <label for="tel">Téléphone :</label>
    <input id="tel" type="text" name="tel" value="">

    <label for="bio">Biographie :</label>
    <textarea id="bio" name="bio" ></textarea>

    <input type="hidden" name="id" value="<?php $_SESSION['id'];?>">
        <input type="submit" value="Modifier">
</form>
<?php
var_dump($_POST);?>
<?php $content = ob_get_clean();?>
<?php require ('../template.php');?>