<?php 
$title = "Connexion";?>
<form class="form-horizontal" action='../src/Controller/signIn.php' method="POST">
    <h1 class="white">CONNEXION</h1>
    <div class="centre hauteurmini">
        <div class="section-box col-lg-5 col-sm-12">
            <section id="recherche-section">


                <p>Bienvenue sur l'application de covoiturage de CESI.<br>Connectez-vous pour accédez à vos services :</p>

                <div class="champ-box">


                    <div class="champ">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="champ">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                    </div>
           
                
                </div>


                <div class="ligne lignebouton">
                    <a href="?p=signUp" class="bouton-vide">JE N'AI PAS DE COMPTE</a>
                    <button class="bouton-plein" type="submit">GO!</button>
                </div>


            </section>
        </div>
    </div>
</form>

<style>
body {
    background-image: url(../public/assets/images/fondue.png) !important;
    background-size: 100% !important;
    background-repeat: no-repeat !important;
}

@media screen and (max-width: 960px) {

body {
    background-color: #fafafa !important;
    background-image: none !important;
    background-size: 100%;
    background-repeat: no-repeat;
}

h1 {
    color: black !important;
}

.white {
    color: black !important;
}

}
</style>