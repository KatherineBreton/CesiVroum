<?php

session_start();
include('../src/Controller/isConnected.php');

if (isset($_GET["p"])) {
    $page = $_GET["p"];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CesiVroum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <!-- <script src="./js/searchTrip.js"> -->
</head>

    <!-- <img src="./assets/images/fondue.png" alt="" class="img-background"> -->
    <?php include('../templates/header.html.php') ?>
    <div class="content">

        <?php

        if (isset($page)) {
            switch ($page) {
                case 'signUp':
                    include('../templates/signUp.html.php');
                    break;
                case 'signUpError':
                    include('../templates/signUpError.html.php');
                    break;
                case 'signIn':
                    include('../templates/signIn.html.php');
                    break;
                case 'profile':
                    include('../templates/profileDisplay.html.php');
                    break;
                case 'createTrip':
                    include('../templates/createTrip.html.php');
                    break;
                case 'findTrip':
                    include('../templates/findTrip.html.php');
                    break;
                case 'about':
                    include('../templates/about.html.php');
                    break;
                case 'legals':
                    include('../templates/legals.html.php');
                    break;
                case 'messages':
                    include('../templates/messages.html.php');
                    break;
                case 'displayTrip':
                    include('../templates/displayTrip.html.php');
                    break;
                case 'editProfile':
                    include('../templates/editProfile.html.php');
                    break;

                default:
                    include('../templates/findTrip.html.php');
                    break;
            }
        }

        ?>

    </div>
    <?php include("../templates/footer.html.php");?>
</body>

</html>