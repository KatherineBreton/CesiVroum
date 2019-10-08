    let resultName;
    let token = 'pk.eyJ1Ijoia2JyZXRvbiIsImEiOiJjazBubDlxa2kwMHpmM2NteGU0bXJ4YmRlIn0._XBPid9mAlQsf_Kl1ZmYUw';

    let mymap = L.map('mapid').setView([51.5, -0.09], 13);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: token
    }).addTo(mymap);


    // RÉCUPÉRATION DU JSON //

    let displayResult = document.getElementById('displayResult');
    let searchAddress = document.getElementById('requestResult');

    var inputstart = document.getElementById('requestResult');
    inputstart.addEventListener('keyup', () => {
        console.log(inputstart.value);

        let url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + inputstart.value + '.json?access_token=' + token;

        // Requête FETCH //
        fetch(url).then((response) => {
            return response.json();
        }).then(data => {
            let result = data.features.map((el) => {
                return {
                    name: el.place_name,
                    center: el.center
                }
            })
            console.log(result);
            displayResult.innerHTML = result[0].name;
            mymap.setView([result[0].center[1], result[0].center[0]], 13);
            let marker = L.marker([result[0].center[1], result[0].center[0]]).addTo(mymap);
            resultName = result[0].name;
            marker.bindPopup(resultName).openPopup();

        })
    })

    searchAddress.href = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + +'.json?access_token=' + token;



    {
        /// MAP DISPLAYER ///
        let marker = L.marker([51.5, -0.09]).addTo(mymap);

        /*let circle = L.circle([51.508, -0.11], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(mymap);*/

        /*let polygon = L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(mymap);*/

        //marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
        //circle.bindPopup("I am a circle.");
        //polygon.bindPopup("I am a polygon.");

        /*let popup = L.popup()
            .setLatLng([51.5, -0.09])
            .setContent("I am a standalone popup.")
            .openOn(mymap);*/

        /*function onMapClick(e) {
            //alert("You clicked the map at " + e.latlng);
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }*/

        mymap.on('click', onMapClick);

        /// MAP DISPLAY ///
    }