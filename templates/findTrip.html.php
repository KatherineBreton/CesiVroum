<?php
include("../src/Model/tripModel.php");
include("../src/Controller/findTrip.php");
?>

<div class="findTrip">
    <h1>VOTRE RECHERCHE</h1>
    <div class="centre hauteurmini">
        <div class="section-box col-lg-8 col-sm-12">
            <section id="recherche-section col-lg-8">
                <div class="lignestart">
                    <?php
                        foreach ($tripInfos as $tripInfo) { ?>
                            <form action="../public/index.php?p=displayTrip" method="POST" class="minifichevoyage col-lg-5 col-sm-12">
                                <button type="submit" class="button-non">
                                    <div class="minificheinfo">
                                        <p class="pligne"><?= $tripInfo['TRI_DEPARTTIME'] ?><span class="espacespan"> </span><?= $tripInfo['TRI_START'] ?></p><br>
                                        <p class="pligne"><?= $tripInfo['TRI_ARRIVTIME'] ?><span class="espacespan"> </span><?= $tripInfo['TRI_ARRIVAL'] ?></p><br>
                                        <!--<p class="pligne"><?= $tripInfo['TRI_PRICE'] ?></p>-->
                                        <input type="hidden" name="id" value="<?= $tripInfo['TRI_ID'] ?>">
                                        <input type="hidden" name="start_lgt" value="<?= $tripInfo['TRI_START_LGT'] ?>">
                                        <input type="hidden" name="start_ltd" value="<?= $tripInfo['TRI_START_LTD'] ?>">
                                        <input type="hidden" name="arrival_lgt" value="<?= $tripInfo['TRI_ARRIVAL_LGT'] ?>">
                                        <input type="hidden" name="arrival_ltd" value="<?= $tripInfo['TRI_ARRIVAL_LTD'] ?>">
                                    </div>
                                </button>
                            </form>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
</div>





