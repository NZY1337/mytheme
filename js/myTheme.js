function myMap() {
    // setting the coordinates
    let url =  {
        lat: 44.396734,
        lng: 26.096080
    }
    // get the html div
    let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: url
    });

    // set the marker specific to client location (url->lat/long)
    let marker = new google.maps.Marker({
        position:url,
        map: map,
        icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
    })
}

myMap();
