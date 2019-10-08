<?php

include '../Model/userModel.php';
include './userController.php';

if (!empty($_POST) && ($_POST['password'] == $_POST['password_confirm'])) {

  userController::signUp();

  header('Location: ../../public/index.php');
} else {
  header('Location: ../../public/index.php/?p=signUpError');
}
