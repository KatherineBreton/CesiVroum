<?php

include("../src/Model/userModel.php");
include("../src/Controller/displayProfile.php");

?>

<div class="displayProfile">
    <h1>VOTRE PROFIL</h1>
    <div class="centre hauteurmini">
        <form action="../public/index.php?p=editProfile" method="POST" class="section-box col-lg-8 col-sm-12">
            <section id="recherche-section">
                <?php
                foreach ($userInfos as $userInfo) { ?>
                    <div class="profil-box">
                        <div class="col-lg-1 col-sm-0">
                        </div>  
                        <div class="col-lg-3 col-sm-12 photobox">
                            <img src="../public/assets/images/profile.png" class="photoprofil" alt="">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h2 class="nomprofil"><?= $userInfo['USE_USERNAME'] ?></h2>
                            <div class="ligne-gauche marge">
                                <p><?= $userInfo['USE_AGE'] ?> ans</p>
                                <div class="ligne etoilesbox">
                                    <img class="etoile" src="../public/assets/images/etoile-pleine.png" alt="">
                                    <img class="etoile" src="../public/assets/images/etoile-pleine.png" alt="">
                                    <img class="etoile" src="../public/assets/images/etoile-pleine.png" alt="">
                                    <img class="etoile" src="../public/assets/images/etoile-pleine.png" alt="">
                                    <img class="etoile" src="../public/assets/images/etoile-vide.png" alt="">
                                </div>
                                <a class="bouton-vide avis" href="">Voir les avis</a>
                            </div>
                            <div class="bio marge">
                                <p><?= $userInfo['USE_BIO'] ?></p>
                            </div>
                            <div class="pictobox marge">
                                <img class="picto" src="../public/assets/images/mail.png" alt="">
                                <p><?= $userInfo['USE_MAIL'] ?></p>
                            </div>
                            <div class="pictobox marge">
                                <img class="picto" src="../public/assets/images/phone.png" alt="">
                                <p><?= $userInfo['USE_TEL'] ?></p>
                            </div>
                            <!-- <p><?= $userInfo['USE_PASSWORD'] ?></p> -->
                        </div>
                        <div class="col-lg-1 col-sm-0">
                        </div>  
                    </div>
                <?php } ?>
                <div class="buttonbox">
                    <button class="bouton-vide">MODIFIER MON PROFIL</button>
                </div>
            </section>
        </form>
    </div>
</div>