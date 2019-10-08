<?php

include("../src/Model/userModel.php");
include("../src/Controller/displayProfile.php");

?>

<div class="editProfile">
<div class="centre hauteurmini">

    <form action="../src/Controller/editProfile.php" method="post" class="col-lg-8 col-sm-12">
    <section id="recherche-section vieuxmargin">
        <?php

        foreach ($userInfos as $userInfo) { ?>
            <label for="user">Nom d'utilisateur : </label>
            <input type="text" name="username" id="" value="<?= $userInfo['USE_USERNAME'] ?>" placeholder="<?= $userInfo['USE_USERNAME'] ?>" ?>
            <br>
            <label for="user">Prénom : </label>
            <input type="text" name="fname" id="" value="<?= $userInfo['USE_FNAME'] ?>" placeholder="<?= $userInfo['USE_FNAME'] ?>" ?>
            <br>
            <label for="user">Nom : </label>
            <input type="text" name="name" id="" value="<?= $userInfo['USE_NAME'] ?>" placeholder="<?= $userInfo['USE_NAME'] ?>">
            <br>
            <label for="age">Âge : </label>
            <input type="number" name="age" id="" value="<?= $userInfo['USE_AGE'] ?>">
            <br>
            <label for="age">Mot de passe : </label>
            <input type="password" name="password" id="" value="<?= $userInfo['USE_PASSWORD'] ?>">
            <br>
            <label for="mail">Adresse mail : </label>
            <input type="text" name="email" id="" value="<?= $userInfo['USE_MAIL'] ?>" placeholder="<?= $userInfo['USE_MAIL'] ?>" ?>
            <br>
            <label for="tel">Téléphone : </label>
            <input type="text" name="tel" id="" value="<?= $userInfo['USE_TEL'] ?>">
            <br>
            <label for="user">Expérience : </label>
            <input type="text" name="exp" id="" value="<?= $userInfo['USE_EXP'] ?>" placeholder="<?= $userInfo['USE_EXP'] ?>" ?>
            <br>
            <label for="user">Statut : </label>
            <input type="text" name="status" id="" value="<?= $userInfo['USE_STATUS'] ?>" placeholder="<?= $userInfo['USE_STATUS'] ?>">
            <br>
            <label for="user">Sexe : </label>
            <input type="text" name="gender" id="" value="<?= $userInfo['USE_GENDER'] ?>" placeholder="<?= $userInfo['USE_GENDER'] ?>" ?>
            <br>
            <label for="user">Bio : </label>
            <input type="text" name="bio" id="" value="<?= $userInfo['USE_BIO'] ?>" placeholder="<?= $userInfo['USE_BIO'] ?>">
            <br>
            <label for="user">Accepte les Animaux : </label>
            <input type="checkbox" name="animals" id="" value="<?= $userInfo['USE_ANIMALS'] ?>" placeholder="<?= $userInfo['USE_ANIMALS'] ?>" ?>
            <br>
            <label for="user">Accepte la cigarette : </label>
            <input type="checkbox" name="smoke" id="" value="<?= $userInfo['USE_SMOKE'] ?>" placeholder="<?= $userInfo['USE_SMOKE'] ?>">
            <br>
            <input type="submit" value="Enregistrer">

        <?php } ?>
            </section>
    </form>
</div>
</div>