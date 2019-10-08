<?php 
$title = "Inscription";?>
<form class="form-horizontal" action='../src/Controller/signUp.php' method="POST">
  <fieldset>
    <h1 class="white">INSCRIPTION</h1>
    <div class="centre hauteurmini">
      <div class="section-box col-lg-6 col-sm-12">
        <section id="recherche-section col-lg-6">



        <div class="recherche">
        
          <div class="champ-box col-lg-5">


        
            <div class="champ">
              <label for="username">Nom d'utilisateur</label>
              <div>
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                <p class="help-block">Votre nom ne doit contenir que des lettres ou des nombres, sans espaces</p>
              </div>
            </div>

            <div class="champ">
              <label for="age">Âge</label>
              <div>
                <input type="number" id="age" name="age" placeholder="" class="input-xlarge">
                <p class="help-block">Veuillez indiquer votre âge</p>
              </div>
            </div>

            <div class="champ">
              <label for="email">E-mail</label>
              <div>
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Veuillez renseigner votre adresse email</p>
              </div>
            </div>



          </div>


          <div class="champ-box col-lg-5">


            
        
            <div class="champ">
              <label for="password">Mot de passe</label>
              <div>
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Votre mot de passe doit contenir au moins 4 caractères</p>
              </div>
            </div>
        
            <div class="champ">
              <label for="password_confirm">Mot de passe (Confirmation)</label>
              <div>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                <p class="help-block">Veuillez confirmer votre mot de passe</p>
              </div>
            </div>

           
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
              <label class="custom-control-label" for="defaultUnchecked">J'accepte les conditions générales d'utilisation</label>
            </div>

            

          </div>
        </div>

          <div class="ligne">
            <a href="?p=signIn" class="bouton-vide">ANNULER</a>
            <button class="bouton-plein" type="submit">S'INSCRIRE</button>
          </div>

        </section>
      </div>
    </div>
  </fieldset>
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