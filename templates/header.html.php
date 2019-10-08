
<div class="centre navbox">
    <nav class="navbar navbar-expand-lg col-lg-8 navbar-light bg-lights">
        <a class="navbar-brand" href="?p=findTrip"><img id="logo" src="../public/assets/images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="?p=findTrip">Rechercher un trajet <span class="sr-only">(current)</span></a>
                <?php if ($isConnected == true) { ?>
                <a class="nav-item nav-link" href="?p=createTrip">Proposer un trajet</a>
                <?php } ?>
                <?php if ($isConnected == true) { ?>
                <a class="nav-item nav-link" href="?p=messages">Messages</a>
                <?php } ?>
                <?php if ($isConnected == true) { ?>
                <a class="nav-item nav-link" href="?p=profile">Mon profil</a>
                <?php } ?>
                <?php if ($isConnected != true) { ?>
                    <a class="nav-item nav-link" href="?p=signIn">Connexion</a>
                <?php } ?>
                <?php if ($isConnected == true) { ?>
                    <a class="nav-item nav-link" href="../src/Controller/logOut.php">Déconnexion</a>
                <?php } ?>
            </div>
        </div>
    </nav>
</div>