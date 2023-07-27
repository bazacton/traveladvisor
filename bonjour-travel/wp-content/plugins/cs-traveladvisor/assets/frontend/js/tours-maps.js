var map;

function initMap() {
    
    'use strict';

    var bounds = new google.maps.LatLngBounds;
    var markersArray = [];
    var origin1 = 'Faisalabad, Punjab, Pakistan';
    var destinationA = 'Jaranwala, Punjab, Pakistan';
    var destinationB = 'Samundri, Punjab, Pakistan';
    var destinationC = 'Gojra, Punjab, Pakistan';

    var destinationIcon = 'img/restaurant_fish.png';
    var originIcon = 'img/walkingtour.png';
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(31.418714, 73.079107),
        zoom: 10
    });

    var lineCoordinates = [
        [31.418714, 73.079107],
        [31.332877, 73.417582],
        [31.069053, 72.936130],
        [31.146790, 72.685221]
    ];


    //First we iterate over the coordinates array to create a
    // new array which includes objects of LatLng class.
    var pointCount = lineCoordinates.length;


    var linePath = [];
    for (var i = 0; i < pointCount; i++) {
        var tempLatLng = new google.maps.LatLng(lineCoordinates[i][0], lineCoordinates[i][1]);
        ////////////InfoBox
        linePath.push(tempLatLng);
    }

    var arrowSymbol = {
        strokeColor: '#0088cc',
        scale: 2,
        offset: '1',
        repeat: '120px',
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        fillColor: '#0088cc',
        fillOpacity: 0.8,
        strokeWeight: 0.001,
        anchor: (0, 0)
    };
    //Polyline properties are defined below
    var lineOptions = {
        path: linePath,
        icons: [{
                icon: arrowSymbol
                        //offset: '100%'
            }],
        geodesic: true,
        strokeWeight: 4,
        strokeColor: '#0088cc',
        strokeOpacity: 0.9
    };
    var polyline = new google.maps.Polyline(lineOptions);

    //Polyline is set to current map.
    polyline.setMap(map);

    animateArrow();

    function animateArrow() {
        var counter = 0;
        window.setInterval(function () {
            counter = (counter + 1) % 200;

            var arrows = polyline.get('icons');
            arrows[0].offset = (counter / 2) + '%';
            polyline.set('icons', arrows);
        }, 50);

    }
    /////////////////////
    var geocoder = new google.maps.Geocoder;

    var service = new google.maps.DistanceMatrixService;
    
    service.getDistanceMatrix({
        origins: [origin1],
        destinations: [destinationA, destinationB, destinationC],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status !== google.maps.DistanceMatrixStatus.OK) {
            alert('Error was:' + status);
        } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;

            deleteMarkers(markersArray);
            var infoWindows = [];
            var infodive = [];
            var countit;

            var showGeocodedAddressOnMap = function (asDestination, ij) {
                var icon = asDestination ? destinationIcon : originIcon;



                return function (results, status) {

                    if (status === google.maps.GeocoderStatus.OK) {
                        //map.fitBounds(bounds.extend(results[0].geometry.location));

                        infodive.push(ij);
                        countit = infodive.length - 1;
                        addMarker(countit);
                        
                        delete countit;

                        // delete ;
                    } else {
                        alert('Geocode was not successful due to: ' + status);
                    }
                    ////////////////

                    function addMarker(countit) {
                        //  alert(countit);

                        markersArray[countit] = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            icon: icon,
                            animation: google.maps.Animation.DROP
                        });
                        // alert(markersArray[countit].position);
                        infoWindows[countit] = new google.maps.InfoWindow({
                            content: document.getElementById("infobox" + countit)
                        });
                        //infoWindows.push(infowindow);
                        // alert(infoWindows.length);

                        var listnnow = document.getElementById("address" + countit);
                        google.maps.event.addDomListener(listnnow, 'click', function () {

                            closeAllInfoWindows();
                            infoWindows[countit].open(map, markersArray[countit]);

                        });
                        ///return markersArray[countit];
                    }
                    function closeAllInfoWindows() {
                        for (var i = 0; i < infoWindows.length; i++) {
                            infoWindows[i].close();
                        }
                    }
                    delete countit;
                    ///////////////
                };
            };

            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[i].elements;
                geocoder.geocode({'address': originList[i]}, showGeocodedAddressOnMap(false, i));
                for (var j = 0; j < results.length; j++) {

                    geocoder.geocode({'address': destinationList[j]},
                    //setTimeout(function(){

                            showGeocodedAddressOnMap(true, j)
                            //}, 100);
                            );


                }
            }
        }
    });
}

function deleteMarkers(markersArray) {
    'use strict';
    for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray = [];
}


