
<div>
    <h1>VOTRE ANNONCE</h1>
    <div class="centre hauteurmini">
        <form action="../src/Controller/createTrip.php" method="POST" class="section-box col-lg-8 col-sm-12">
            <section id="recherche-section">
                <div class='recherche'>
                    <div class="champ-box">
                        <div class="champ">
                            <label for="start">Lieu de départ</label>
                            <input type="text" name="start" id="requestResultStart" aria-describedby="helpId" placeholder="ex : Rouen, rue de la République">
                        </div>
                        <div class="champ">
                            <label for="departtime">Heure de départ</label>
                            <input type="time" name="departtime" id="departtime">
                        </div>
                        <div class="champ">
                            <label for="arrival">Lieu d'arrivée</label>
                            <input type="text" name="arrival" id="requestResultArrival" aria-describedby="helpId" placeholder="ex : CESI Rouen">
                        </div>
                        <div class="champ">
                            <label for="arrivaltime">Heure d'arrivée</label>
                            <input type="time" name="arrivaltime" id="arrivaltime">
                        </div>
                        <label for="price">
                            <input type="number" name="price" id="price">Prix (euros)
                        </label>
                        <input type="hidden" value="" name="arrival_lgt" id="arrival_lgt">
                        <input type="hidden" value="" name="arrival_ltd" id="arrival_ltd">
                    </div>
                    <input type="hidden" value="" name="start_lgt" id="start_lgt">
                    <input type="hidden" value="" name="start_ltd" id="start_ltd">
                    <div class="resultStart">
                        <p  onclick="insertIntoStartField(this)" href="" id='result1Start'></p>
                        <p  onclick="insertIntoStartField(this)" href="" id='result2Start'></p>
                        <p  onclick="insertIntoStartField(this)" href="" id='result3Start'></p>
                    </div>
                    <div class="resultArrival">
                        <p  onclick="insertIntoArrivalField(this)" href="" id='result1Arrival'></p>
                        <p  onclick="insertIntoArrivalField(this)" href="" id='result2Arrival'></p>
                        <p  onclick="insertIntoArrivalField(this)" href="" id='result3Arrival'></p>
                    </div>
                    <div class="champ-box">

                        <div id="mapid"></div>
                        
                    </div>
                </div>
                
                <button type="submit" class="bouton-plein">Créer</button>
            </section>
        </form>
    </div>
    <!-- <a name="" id="searchLink" class="btn btn-primary" href="#" role="button">Recherche "Rouen"</a> -->

</div>

<script>
    let resultName;
    // Katherine
    //let token = 'pk.eyJ1Ijoia2JyZXRvbiIsImEiOiJjazBubDlxa2kwMHpmM2NteGU0bXJ4YmRlIn0._XBPid9mAlQsf_Kl1ZmYUw';
    //Jérôme
    let token = 'pk.eyJ1IjoiZGFuaWVsNjY2IiwiYSI6ImNrMHVuOHdpajBqbngzbnFwdWUwYWJmM3gifQ.1W86ZTL_Wp3vH6ljwx_qZQ';

    //let mymap = L.map('mapid').setView([51.5, -0.09], 13);
    let mymap = L.map('mapid').setView([49.477091, 1.091834], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: token
    }).addTo(mymap);

    let latlngs = [
        [45.51, -122.68],
        [37.77, -122.43],
        [34.04, -118.2]
    ];
    let polyline = L.polyline(latlngs, {
        color: 'blue'
    }).addTo(mymap);
    // zoom the map to the polyline
    mymap.fitBounds(polyline.getBounds());


    // RÉCUPÉRATION DU JSON //

    let result1Start = document.getElementById('result1Start');
    let result2Start = document.getElementById('result2Start');
    let result3Start = document.getElementById('result3Start');

    let result1Arrival = document.getElementById('result1Arrival');
    let result2Arrival = document.getElementById('result2Arrival');
    let result3Arrival = document.getElementById('result3Arrival');

    let resultStart = document.getElementsByClassName('resultStart');
    let resultArrival = document.getElementsByClassName('resultArrival');

    let searchAddressStart = document.getElementById('requestResultStart');
    let searchAddressArrival = document.getElementById('requestResultArrival');

    let resultElements = document.getElementsByClassName('resultElements');

    console.log(resultElements);

    {
        /////////////// EVENT LISTENER START ///////////////

        let inputstart = document.getElementById('requestResultStart');
        inputstart.addEventListener('keyup', () => {
            console.log(inputstart.value);
            if (inputstart.value == '') {
                resultStart[0].style.visibility = "hidden";
                console.log(inputstart.value);
            }

            let url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + inputstart.value + '.json?access_token=' + token;

            // Requête FETCH //
            fetch(url).then((response) => {
                return response.json();
            }).then(data => {
                result = data.features.map((el) => {
                    return {
                        name: el.place_name,
                        center: el.center
                    }
                })
                console.log(result);
                resultStart[0].style.visibility = "visible";
                result1Start.innerHTML = result[0].name;
                result2Start.innerHTML = result[1].name;
                result3Start.innerHTML = result[2].name;
                mymap.setView([result[0].center[1], result[0].center[0]], 13);
                let marker = L.marker([result[0].center[1], result[0].center[0]]).addTo(mymap);
                resultName = result[0].name;
                marker.bindPopup(resultName).openPopup();
                //console.log(result1);

            })
        })

        //////////////////////////////////////////////////////
    } {
        /////////////// EVENT LISTENER ARRIVAL ///////////////

        let inputarrival = document.getElementById('requestResultArrival');
        inputarrival.addEventListener('keyup', () => {
            console.log(inputarrival.value);
            if (inputarrival.value == '') {
                resultArrival[0].style.visibility = "hidden";
                console.log(inputarrival.value);
            }

            let url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + inputarrival.value + '.json?access_token=' + token;

            // Requête FETCH //
            fetch(url).then((response) => {
                return response.json();
            }).then(data => {
                result = data.features.map((el) => {
                    return {
                        name: el.place_name,
                        center: el.center
                    }
                })
                console.log(result);
                resultArrival[0].style.visibility = "visible";
                result1Arrival.innerHTML = result[0].name;
                result2Arrival.innerHTML = result[1].name;
                result3Arrival.innerHTML = result[2].name;
                mymap.setView([result[0].center[1], result[0].center[0]], 13);
                let marker = L.marker([result[0].center[1], result[0].center[0]]).addTo(mymap);
                resultName = result[0].name;
                marker.bindPopup(resultName).openPopup();

            })
        })

        //////////////////////////////////////////////////////
    }

    function insertIntoStartField(searchValue) {
        searchAddressStart.value = searchValue.innerHTML;
        let startLgt = result[0].center[0];
        document.getElementById("start_lgt").value = startLgt;
        let startLat = result[0].center[1];
        document.getElementById("start_ltd").value = startLat;
        resultStart[0].style.visibility = "hidden";
        console.log(searchValue);
        console.log(result[0].center[0] + " " + result[0].center[1])
    }

    function insertIntoArrivalField(searchValue) {
        searchAddressArrival.value = searchValue.innerHTML;
        let arrivalLgt = result[0].center[0];
        document.getElementById("arrival_lgt").value = arrivalLgt;
        let arrivalLat = result[0].center[1];
        document.getElementById("arrival_ltd").value = arrivalLat;
        resultArrival[0].style.visibility = "hidden";
        console.log(searchValue);
        console.log(result[0].center[0] + " " + result[0].center[1])
    }

</script>