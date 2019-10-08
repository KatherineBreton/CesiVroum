<?php

include("../src/Controller/displayTrip.php");
//include("../src/Model/tripModel.php");

?>

<div class="displayTrip">
<h1>VOTRE RECHERCHE</h1>
    <div class="centre hauteurmini">
        <div class="section-box col-lg-8 col-sm-12">
            <section id="recherche-section col-lg-8">
                <div class="lignestart">
                    <?php

                    foreach ($tripInfos as $tripInfo) { ?>
                        <form action="" method="post" class="formflex">
                            <p class="pligne">Départ : <?= $tripInfo['TRI_DEPARTTIME'] ?><span class="espacespan"> </span><?= $tripInfo['TRI_START'] ?></p>
                            <p class="pligne">Arrivée : <?= $tripInfo['TRI_ARRIVTIME'] ?><span class="espacespan"> </span><?= $tripInfo['TRI_ARRIVAL'] ?></p>
                            <p class="pligne">Conducteur : <a href="" class="bouton-vide conducteurbouton">John Doe</a> </p>
                            <p>Prix : <?= $tripInfo['TRI_PRICE'] ?> (Prix estimé : <span id="estimatedPrice"></span>) </p>
                            <div class="vroum">
                                <button type="submit" class="bouton-plein">VROUM</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div id="mapid"></div>
            </section>
        </div>
    </div>

</div>



<script>
    let latlngs = [];
    let coords = [];
    let token = 'pk.eyJ1IjoiZGFuaWVsNjY2IiwiYSI6ImNrMHVuOHdpajBqbngzbnFwdWUwYWJmM3gifQ.1W86ZTL_Wp3vH6ljwx_qZQ';
    ///////////// TEST DIRECTIONS /////////////
    let url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + <?= $_POST['start_lgt'] ?> + ',' + <?= $_POST['start_ltd'] ?> + ';' + <?= $_POST['arrival_lgt'] ?> + ',' + <?= $_POST['arrival_ltd'] ?> + '.json?access_token=' + token;
    let url2 = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + <?= $_POST['start_lgt'] ?> + ',' + <?= $_POST['start_ltd'] ?> + ';' + <?= $_POST['arrival_lgt'] ?> + ',' + <?= $_POST['arrival_ltd'] ?> + '.json?geometries=geojson&access_token=' + token;

    console.log(url);

    let directions;

    /*fetch(url).then((responseTest) => {
        return responseTest.json();
    }).then(dataTest => {
        console.log(dataTest);
        resultTest = dataTest.waypoints.map((el) => {
            return {
                name: el.name,
                longitude: el.location[0],
                latitude: el.location[1],
                distance: el.distance
            }
        })
        //console.log(resultTest);*/

    fetch(url2).then((responseTest) => {
        return responseTest.json();
    }).then(dataTest => {
        resultTest = dataTest.routes.map((el) => {
            return {
                coordinates: el.geometry.coordinates,
                distance: el.legs[0].distance
            }
        })

        console.log(resultTest);
        console.log(resultTest[0].distance);
        estimatedPrice = ((resultTest[0].distance * 0.270) / 1000).toFixed(2) + " euros";
        console.log(estimatedPrice);
        document.getElementById('estimatedPrice').innerHTML = estimatedPrice;


        for (let index = 0; index < resultTest[0].coordinates.length; index++) {
            console.log(resultTest[0].coordinates[index][0]);
            coords.push([resultTest[0].coordinates[index][1], resultTest[0].coordinates[index][0]]);
            console.log(resultTest[0].coordinates[index][1]);
        }

        console.log("COOOOOOOOOOORDS");
        console.log(coords);
        console.log("COOOOOOOOOOORDS");

        latlngs.push(resultTest[0].coordinates)
        console.log("LAAAAATLNNNNGS");
        console.log(latlngs);
        console.log("LAAAAATLNNNNGS");

        let i = 0;
        resultTest.forEach(point => {
            //console.log(resultTest[i].name);
            //console.log(resultTest[i].longitude);
            //console.log(resultTest[i].latitude);
            //console.log(resultTest[i].distance);
            //console.log("-------------");
            //latlngs.push([resultTest[i].latitude, resultTest[i].longitude])
            i++;
        });
        console.dir("Après insertion : ");
        console.dir(latlngs);
        let polyline = L.polyline(latlngs, {
            color: 'blue'
        }).addTo(mymap);
    })
    ///////////// TEST DIRECTIONS /////////////

    let resultName;

    let mymap = L.map('mapid').setView([49.477091, 1.091834], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: token
    }).addTo(mymap);

    latlngs = [];

    function createPoly() {
        let polyline = L.polyline(coords, {
            color: 'blue'
        }).addTo(mymap);
        // zoom the map to the polyline
        mymap.fitBounds(polyline.getBounds());
    }

    setTimeout(() => {
        createPoly();
    }, 500);

    ///////////// TEST DIRECTIONS /////////////
</script>